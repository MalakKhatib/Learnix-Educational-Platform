@extends('student.layouts.app')

@section('title', $lesson->title)

@section('content')

<div class="lesson-page">

    {{-- =====================================================
         TOP NAVIGATION
    ====================================================== --}}

    <div class="lesson-back-row">

        <a
            href="/courses/{{ $lesson->course_id }}"
            class="lesson-back-btn"
        >
            <i class="fas fa-arrow-right"></i>
            {{ __('messages.back_to_course') }}
        </a>

        @if($completed)

            <div class="lesson-status completed">
                <i class="fas fa-circle-check"></i>
                {{ __('messages.lesson_completed') }}
            </div>

        @else

            <div class="lesson-status">
                <i class="fas fa-book-open"></i>
                {{ __('messages.educational_lesson') }}
            </div>

        @endif

    </div>


    {{-- =====================================================
         LESSON HEADER
    ====================================================== --}}

    <div class="lesson-hero">

        <div class="lesson-hero-content">

            <div class="lesson-label">
                <i class="fas fa-book-open"></i>
                {{ __('messages.educational_content') }}
            </div>

            <h1>
                {{ $lesson->title }}
            </h1>

            <p>
                {{ $lesson->course->title }}
            </p>

            <div class="lesson-meta">

                <span>
                    <i class="fas fa-graduation-cap"></i>

                    {{ __('messages.within_course', [
                        'course' => $lesson->course->title
                    ]) }}
                </span>

            </div>

        </div>

        <div class="lesson-hero-icon">
            <i class="fas fa-book-open"></i>
        </div>

    </div>


    {{-- =====================================================
         LESSON CONTENT
    ====================================================== --}}

    <div class="lesson-content-card">

        <div class="lesson-section-header">

            <div class="lesson-section-icon">
                <i class="fas fa-align-right"></i>
            </div>

            <div>

                <h3>
                    {{ __('messages.lesson_content') }}
                </h3>

                <p>
                    {{ __('messages.read_content') }}
                </p>

            </div>

        </div>

        <div class="lesson-text">
            {{ $lesson->content }}
        </div>

    </div>


    {{-- =====================================================
         VIDEO
    ====================================================== --}}

    @if($lesson->video_path)

        <div class="lesson-content-card">

            <div class="lesson-section-header">

                <div class="lesson-section-icon video-icon">
                    <i class="fas fa-circle-play"></i>
                </div>

                <div>

                    <h3>
                        {{ __('messages.lesson_video') }}
                    </h3>

                    <p>
                        {{ __('messages.watch_video') }}
                    </p>

                </div>

            </div>


            {{-- VIDEO PLAYER --}}

            <div class="lesson-video-wrapper">

                <video
                    id="lessonVideo"
                    controls
                    width="100%"
                    preload="metadata"
                >

                    <source
                        src="{{ asset('storage/' . $lesson->video_path) }}"
                        type="video/mp4"
                    >

                    {{ __('messages.video_not_supported') }}

                </video>

            </div>


            {{-- =====================================================
                 ATTENDANCE MESSAGE
            ====================================================== --}}

            <div
                id="attendanceMessage"
                style="
                    width:100%;
                    box-sizing:border-box;
                    margin-top:15px;
                    padding:12px 16px;
                    border-radius:12px;
                    font-size:14px;
                    font-weight:700;
                    text-align:right;
                    direction:rtl;
                    display:block;
                    background:{{ $attendanceRecorded ? '#ECFDF3' : '#F5F3FF' }};
                    color:{{ $attendanceRecorded ? '#15803D' : '#6D28D9' }};
                "
            >

                @if($attendanceRecorded)

                    <i class="fas fa-circle-check"></i>
                    تم تسجيل حضورك

                @else

                    <i class="fas fa-clock"></i>
                    يتم احتساب مدة المشاهدة...

                @endif

            </div>

        </div>

    @endif


    {{-- =====================================================
         COMPLETE LESSON
    ====================================================== --}}

    <div class="lesson-complete-card">

        <div
            class="complete-content"
            style="
                display:flex;
                align-items:center;
                justify-content:flex-start;
                gap:13px;
                flex:0 0 auto;
                width:auto;
                direction:rtl;
            "
        >

            @if($completed)

                <div class="complete-icon completed">
                    <i class="fas fa-circle-check"></i>
                </div>

                <div
                    class="complete-text"
                    style="
                        display:flex;
                        flex-direction:column;
                        justify-content:center;
                        min-width:0;
                        text-align:right;
                    "
                >

                    <h3>
                        {{ __('messages.lesson_completed_success') }}
                    </h3>

                    <p>
                        {{ __('messages.next_lesson_message') }}
                    </p>

                </div>

            @else

                <div class="complete-icon">

                    <i class="fas fa-check"></i>

                </div>

                <div
                    class="complete-text"
                    style="
                        display:flex;
                        flex-direction:column;
                        justify-content:center;
                        min-width:0;
                        text-align:right;
                    "
                >

                    <h3>
                        {{ __('messages.finished_studying') }}
                    </h3>

                    <p>
                        {{ __('messages.mark_lesson_completed') }}
                    </p>

                </div>

            @endif

        </div>


        {{-- =====================================================
             COMPLETE BUTTON
        ====================================================== --}}

        @if(!$completed)

            <form
                method="POST"
                action="/lessons/{{ $lesson->id }}/complete"
            >

                @csrf

                <button
                    type="submit"
                    class="complete-lesson-btn"
                >

                    <span>
                        {{ __('messages.complete_lesson') }}
                    </span>

                    <i class="fas fa-arrow-left"></i>

                </button>

            </form>

        @else

            <div class="completed-lesson-btn">

                <i class="fas fa-check-circle"></i>

                {{ __('messages.completed_status') }}

            </div>

        @endif

    </div>

</div>


{{-- =====================================================
     VIDEO ATTENDANCE TRACKING
====================================================== --}}

@if($lesson->video_path)

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | عناصر الصفحة
    |--------------------------------------------------------------------------
    */

    const video = document.getElementById('lessonVideo');
    const message = document.getElementById('attendanceMessage');


    /*
    |--------------------------------------------------------------------------
    | التأكد من وجود الفيديو والرسالة
    |--------------------------------------------------------------------------
    */

    if (!video || !message) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | حالة الحضور القادمة من قاعدة البيانات
    |--------------------------------------------------------------------------
    */

    let attendanceSent = @json($attendanceRecorded);


    /*
    |--------------------------------------------------------------------------
    | الوقت المشاهد
    |--------------------------------------------------------------------------
    */

    let watchedSeconds = 0;
    let lastTime = 0;


    /*
    |--------------------------------------------------------------------------
    | دالة إظهار رسالة تسجيل الحضور
    |--------------------------------------------------------------------------
    */

    function showAttendanceSuccess() {

        message.style.display = 'block';

        message.style.background = '#ECFDF3';

        message.style.color = '#15803D';

        message.innerHTML =
            '<i class="fas fa-circle-check"></i> تم تسجيل حضورك';

    }


    /*
    |--------------------------------------------------------------------------
    | دالة إظهار رسالة احتساب مدة المشاهدة
    |--------------------------------------------------------------------------
    */

    function showWatchingMessage() {

        message.style.display = 'block';

        message.style.background = '#F5F3FF';

        message.style.color = '#6D28D9';

        message.innerHTML =
            '<i class="fas fa-clock"></i> يتم احتساب مدة المشاهدة...';

    }


    /*
    |--------------------------------------------------------------------------
    | إذا كان الحضور مسجلاً مسبقاً
    |--------------------------------------------------------------------------
    */

    if (attendanceSent) {

        showAttendanceSuccess();

    }


    /*
    |--------------------------------------------------------------------------
    | حساب الوقت المشاهد
    |
    | لا نحسب القفزات الكبيرة في الفيديو.
    |--------------------------------------------------------------------------
    */

    video.addEventListener('timeupdate', function () {

        const currentTime = video.currentTime;


        if (
            !video.paused &&
            currentTime >= lastTime &&
            currentTime - lastTime <= 2
        ) {

            watchedSeconds += currentTime - lastTime;

        }


        lastTime = currentTime;


        /*
        |--------------------------------------------------------------------------
        | إذا كان الحضور مسجلاً مسبقاً
        |--------------------------------------------------------------------------
        */

        if (attendanceSent) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | حساب نسبة المشاهدة
        |--------------------------------------------------------------------------
        */

        if (video.duration) {

            const percentage =
                (watchedSeconds / video.duration) * 100;


            /*
            |--------------------------------------------------------------------------
            | تسجيل الحضور بعد مشاهدة 70%
            |--------------------------------------------------------------------------
            */

            if (
                percentage >= 70 &&
                !attendanceSent
            ) {

                sendAttendance();

            }

        }

    });


    /*
    |--------------------------------------------------------------------------
    | عند تشغيل الفيديو
    |--------------------------------------------------------------------------
    */

    video.addEventListener('play', function () {


        /*
        |--------------------------------------------------------------------------
        | إذا كان الطالب قد سجل حضوره مسبقاً
        | تبقى الرسالة الخضراء
        |--------------------------------------------------------------------------
        */

        if (attendanceSent) {

            showAttendanceSuccess();

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | الطالب لم يسجل الحضور بعد
        |--------------------------------------------------------------------------
        */

        showWatchingMessage();

    });


    /*
    |--------------------------------------------------------------------------
    | عند تقديم الفيديو أو القفز داخله
    |--------------------------------------------------------------------------
    */

    video.addEventListener('seeking', function () {

        lastTime = video.currentTime;

    });


    /*
    |--------------------------------------------------------------------------
    | إرسال الحضور إلى Laravel
    |--------------------------------------------------------------------------
    */

    function sendAttendance() {

        if (attendanceSent) {
            return;
        }


        fetch(
            '/lessons/{{ $lesson->id }}/attendance',
            {
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',

                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}',

                    'Accept':
                        'application/json'
                },

                body: JSON.stringify({

                    watched_seconds:
                        Math.floor(watchedSeconds),

                    video_duration:
                        Math.floor(video.duration)

                })

            }
        )

        .then(response => {

            if (!response.ok) {
                throw new Error('Attendance request failed');
            }

            return response.json();

        })

        .then(data => {

            if (data.success) {

                /*
                |--------------------------------------------------------------------------
                | تثبيت حالة الحضور
                |--------------------------------------------------------------------------
                */

                attendanceSent = true;


                /*
                |--------------------------------------------------------------------------
                | إظهار الرسالة الخضراء
                |--------------------------------------------------------------------------
                */

                showAttendanceSuccess();

            }

        })

        .catch(error => {

            console.error(
                'Attendance Error:',
                error
            );

        });

    }

});

</script>

@endif


{{-- =====================================================
     EXTRA CSS FOR COMPLETE LESSON CARD
====================================================== --}}

<style>

.lesson-complete-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}


.lesson-complete-card .complete-content {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-start !important;
    gap: 13px !important;
    flex: 0 0 auto !important;
    width: auto !important;
    direction: rtl !important;
}


.lesson-complete-card .complete-text {
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    align-items: flex-start !important;
    min-width: 0 !important;
    width: auto !important;
    flex: 0 0 auto !important;
    text-align: right !important;
}


.lesson-complete-card .complete-text h3 {
    margin: 0 0 4px !important;
    color: #352E3E;
    font-size: 16px;
    font-weight: 800;
    text-align: right !important;
    white-space: nowrap;
}


.lesson-complete-card .complete-text p {
    margin: 0 !important;
    color: #918998;
    font-size: 11px;
    text-align: right !important;
}


.lesson-complete-card .complete-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #7C3AED;
    background: #F0E9FF;
    border-radius: 15px;
}


.lesson-complete-card .complete-icon.completed {
    color: #16A34A;
    background: #DCFCE7;
}


.lesson-complete-card .complete-icon i {
    font-size: 19px;
}


@media (max-width: 650px) {

    .lesson-complete-card {
        flex-direction: column;
        align-items: stretch;
    }

    .lesson-complete-card .complete-content {
        width: 100% !important;
    }

    .lesson-complete-card .complete-text h3 {
        white-space: normal;
    }

}

</style>


{{-- =========================================================
     LESSON COMMENTS
========================================================= --}}

{{-- =========================================================
     LESSON COMMENTS
========================================================= --}}

<div class="lesson-comments-section">

    <div class="lesson-comments-header">

        <div class="lesson-comments-title">

            <div class="lesson-comments-icon">
                <i class="fas fa-comments"></i>
            </div>

            <div>
                <h2>{{ __('messages.lesson_comments_title') }}</h2>

                <p>{{ __('messages.lesson_comments_subtitle') }}</p>
            </div>

        </div>

        <div class="lesson-comments-count">

            <i class="fas fa-comment-dots"></i>

            {{ $comments->count() }}

        </div>

    </div>


    {{-- إضافة تعليق --}}
    <div class="add-comment-card">

        <div class="add-comment-title">

            <i class="fas fa-pen"></i>

            <span>
                {{ __('messages.add_comment') }}
            </span>

        </div>


        {{-- رسالة النجاح --}}
        @if(session('comment_success'))

            <div class="comment-success-message">

                <i class="fas fa-circle-check"></i>

                {{ session('comment_success') }}

            </div>

        @endif


        {{-- رسالة الخطأ --}}
        @if($errors->has('comment'))

            <div class="comment-error-message">

                <i class="fas fa-circle-exclamation"></i>

                {{ $errors->first('comment') }}

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('lesson.comments.store', $lesson->id) }}"
        >

            @csrf

            <textarea
                name="comment"
                class="lesson-comment-input"
                rows="4"
                maxlength="2000"
                placeholder="{{ __('messages.comment_placeholder') }}"
                required
            ></textarea>


            <div class="comment-form-footer">

                <span class="comment-hint">

                    <i class="fas fa-info-circle"></i>

                    {{ __('messages.comment_visible_to_students') }}

                </span>


                <button
                    type="submit"
                    class="add-comment-btn"
                >

                    <i class="fas fa-paper-plane"></i>

                    <span>
                        {{ __('messages.post_comment') }}
                    </span>

                </button>

            </div>

        </form>

    </div>


    {{-- قائمة التعليقات --}}
    <div class="lesson-comments-list">

        @forelse($comments as $comment)

            <div class="lesson-comment-card">

                <div class="comment-main">

                    <div class="comment-avatar">

                        @if($comment->user && $comment->user->profile_image)

                            <img
                                src="{{ asset('storage/' . $comment->user->profile_image) }}"
                                alt="{{ $comment->user->name }}"
                            >

                        @else

                            <i class="fas fa-user"></i>

                        @endif

                    </div>


                    <div class="comment-body">

                        <div class="comment-top">

                            <div class="comment-author">
                                {{ $comment->user->name }}
                            </div>

                            <div class="comment-date">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>

                        </div>


                        {{-- وضع العرض --}}
                        <div
                            class="comment-display"
                            id="comment-display-{{ $comment->id }}"
                        >

                            <div class="comment-text">
                                {{ $comment->comment }}
                            </div>


                            {{-- أزرار صاحب التعليق --}}
                            @if(auth()->id() === $comment->user_id)

                                <div class="comment-actions">

                                    {{-- تعديل --}}
                                    <button
                                        type="button"
                                        class="edit-comment-btn"
                                        onclick="editComment({{ $comment->id }})"
                                    >
                                        <i class="fas fa-pen"></i>
                                        <span>تعديل</span>
                                    </button>


                                    {{-- حذف --}}
                                    <form
                                        method="POST"
                                        action="{{ route('lesson.comments.destroy', $comment->id) }}"
                                        onsubmit="return confirm('هل أنت متأكد من حذف التعليق؟')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-comment-btn"
                                        >
                                            <i class="fas fa-trash"></i>
                                            <span>حذف</span>
                                        </button>

                                    </form>

                                </div>

                            @endif

                        </div>


                        {{-- وضع التعديل --}}
                        @if(auth()->id() === $comment->user_id)

                            <div
                                class="comment-edit-box"
                                id="comment-edit-{{ $comment->id }}"
                                style="display:none;"
                            >

                                <form
                                    method="POST"
                                    action="{{ route('lesson.comments.update', $comment->id) }}"
                                >

                                    @csrf
                                    @method('PUT')


                                    <textarea
                                        name="comment"
                                        class="lesson-comment-input edit-comment-input"
                                        rows="3"
                                        maxlength="2000"
                                        required
                                    >{{ $comment->comment }}</textarea>


                                    <div class="edit-comment-actions">

                                        <button
                                            type="submit"
                                            class="save-comment-btn"
                                        >

                                            <i class="fas fa-check"></i>

                                            <span>حفظ التعديل</span>

                                        </button>


                                        <button
                                            type="button"
                                            class="cancel-edit-btn"
                                            onclick="cancelEdit({{ $comment->id }})"
                                        >

                                            <i class="fas fa-xmark"></i>

                                            <span>إلغاء</span>

                                        </button>

                                    </div>

                                </form>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- ردود المعلم --}}
                @foreach($comment->replies as $reply)

                    <div class="teacher-reply">

                        <div class="teacher-reply-line"></div>


                        <div class="teacher-reply-content">

                            <div class="teacher-reply-avatar">

                                <i class="fas fa-chalkboard-user"></i>

                            </div>


                            <div class="teacher-reply-body">

                                <div class="teacher-reply-top">

                                    <div class="teacher-reply-author">

                                        <i class="fas fa-shield-check"></i>

                                        {{ $reply->user->name }}

                                        <span>
                                            {{ __('messages.teacher_reply') }}
                                        </span>

                                    </div>


                                    <div class="teacher-reply-date">

                                        {{ $reply->created_at->diffForHumans() }}

                                    </div>

                                </div>


                                {{-- وضع عرض الرد --}}
                                <div
                                    class="comment-display"
                                    id="comment-display-{{ $reply->id }}"
                                >

                                    <div class="teacher-reply-text">
                                        {{ $reply->comment }}
                                    </div>


                                    {{-- أزرار المعلم صاحب الرد --}}
                                    @if(auth()->id() === $reply->user_id)

                                        <div class="comment-actions">

                                            {{-- تعديل الرد --}}
                                            <button
                                                type="button"
                                                class="edit-comment-btn"
                                                onclick="editComment({{ $reply->id }})"
                                            >

                                                <i class="fas fa-pen"></i>

                                                <span>تعديل</span>

                                            </button>


                                            {{-- حذف الرد --}}
                                            <form
                                                method="POST"
                                                action="{{ route('lesson.comments.destroy', $reply->id) }}"
                                                onsubmit="return confirm('هل أنت متأكد من حذف الرد؟')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="delete-comment-btn"
                                                >

                                                    <i class="fas fa-trash"></i>

                                                    <span>حذف</span>

                                                </button>

                                            </form>

                                        </div>

                                    @endif

                                </div>


                                {{-- وضع تعديل الرد --}}
                                @if(auth()->id() === $reply->user_id)

                                    <div
                                        class="comment-edit-box"
                                        id="comment-edit-{{ $reply->id }}"
                                        style="display:none;"
                                    >

                                        <form
                                            method="POST"
                                            action="{{ route('lesson.comments.update', $reply->id) }}"
                                        >

                                            @csrf
                                            @method('PUT')


                                            <textarea
                                                name="comment"
                                                class="lesson-comment-input edit-comment-input"
                                                rows="3"
                                                maxlength="2000"
                                                required
                                            >{{ $reply->comment }}</textarea>


                                            <div class="edit-comment-actions">

                                                <button
                                                    type="submit"
                                                    class="save-comment-btn"
                                                >

                                                    <i class="fas fa-check"></i>

                                                    <span>حفظ التعديل</span>

                                                </button>


                                                <button
                                                    type="button"
                                                    class="cancel-edit-btn"
                                                    onclick="cancelEdit({{ $reply->id }})"
                                                >

                                                    <i class="fas fa-xmark"></i>

                                                    <span>إلغاء</span>

                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @empty

            <div class="no-comments-card">

                <div class="no-comments-icon">

                    <i class="far fa-comments"></i>

                </div>


                <h3>
                    {{ __('messages.no_comments_yet') }}
                </h3>


                <p>
                    {{ __('messages.be_first_to_comment') }}
                </p>

            </div>

        @endforelse

    </div>

</div>


{{-- =========================================================
     COMMENT EDIT JAVASCRIPT
========================================================= --}}

<script>
    function editComment(id) {

        const displayBox = document.getElementById('comment-display-' + id);
        const editBox = document.getElementById('comment-edit-' + id);

        if (!displayBox || !editBox) {
            return;
        }

        displayBox.style.display = 'none';
        editBox.style.display = 'block';

        const textarea = editBox.querySelector('textarea');

        if (textarea) {
            textarea.focus();

            textarea.setSelectionRange(
                textarea.value.length,
                textarea.value.length
            );
        }
    }


    function cancelEdit(id) {

        const displayBox = document.getElementById('comment-display-' + id);
        const editBox = document.getElementById('comment-edit-' + id);

        if (!displayBox || !editBox) {
            return;
        }

        editBox.style.display = 'none';
        displayBox.style.display = 'block';
    }
</script>


{{-- =========================================================
     COMMENT ACTIONS CSS
========================================================= --}}

<style>

.comment-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 9px;
}

.comment-actions form {
    margin: 0;
}


.edit-comment-btn,
.delete-comment-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 5px 10px;
    border: 0;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
}

.edit-comment-btn {
    background: #F3EEFF;
    color: #6D28D9;
}

.edit-comment-btn:hover {
    background: #E9DFFF;
    color: #5B21B6;
    transform: translateY(-1px);
}

.delete-comment-btn {
    background: #FEF2F2;
    color: #DC2626;
}

.delete-comment-btn:hover {
    background: #FEE2E2;
    color: #B91C1C;
    transform: translateY(-1px);
}

.edit-comment-btn i,
.delete-comment-btn i {
    font-size: 10px;
}


.comment-edit-box {
    margin-top: 10px;
    width: 100%;
}

.edit-comment-input {
    width: 100%;
    box-sizing: border-box;
    min-height: 85px;
    resize: vertical;
}


.edit-comment-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
}


.save-comment-btn,
.cancel-edit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 7px 12px;
    border: 0;
    border-radius: 9px;
    font-size: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
}

.save-comment-btn {
    background: linear-gradient(135deg, #6D28D9, #8B5CF6);
    color: white;
}

.save-comment-btn:hover {
    transform: translateY(-1px);
}

.cancel-edit-btn {
    background: #F3F4F6;
    color: #6B7280;
}

.cancel-edit-btn:hover {
    background: #E5E7EB;
}


@media (max-width: 650px) {

    .comment-actions {
        flex-wrap: wrap;
    }

    .edit-comment-actions {
        flex-wrap: wrap;
    }

}

</style>
@endsection
