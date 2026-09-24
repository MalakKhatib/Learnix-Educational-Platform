@extends('teacher.layouts.app')

@section('title', $lesson->title)

@section('content')

<div class="teacher-lesson-show-page">


    {{-- =====================================================
         LESSON HEADER
    ====================================================== --}}

    <div class="teacher-lesson-header">

        <div class="teacher-lesson-header-info">

            <div class="teacher-lesson-header-icon">
                <i class="fas fa-book-open"></i>
            </div>

            <div>

                <div class="teacher-section-label">
                    <i class="fas fa-graduation-cap"></i>

                    {{ __('messages.lesson_details') }}
                </div>

                <h2>
                    {{ $lesson->title }}
                </h2>

                <p>
                    {{ __('messages.lesson_details_description') }}
                </p>

            </div>

        </div>


        <div class="teacher-lesson-actions">

            {{-- عرض الحضور --}}
            <a
                href="{{ route('teacher.attendance', $lesson->id) }}"
                class="lesson-action-btn attendance">

                <i class="fas fa-user-check"></i>

                {{ __('messages.attendance') }}

            </a>


            {{-- تعديل --}}
            <a
                href="{{ route('teacher.lessons.edit', $lesson->id) }}"
                class="lesson-action-btn edit">

                <i class="fas fa-pen"></i>

                {{ __('messages.edit') }}

            </a>


            {{-- حذف --}}
            <form
                action="{{ route('teacher.lessons.destroy', $lesson->id) }}"
                method="POST">

                @csrf

                @method('DELETE')

                <button
                    type="submit"
                    class="lesson-action-btn delete"
                    onclick="return confirm('{{ __('messages.confirm_delete_lesson') }}')">

                    <i class="fas fa-trash"></i>

                    {{ __('messages.delete') }}

                </button>

            </form>

        </div>

    </div>



    {{-- =====================================================
         LESSON CONTENT
    ====================================================== --}}

    <div class="teacher-lesson-card">

        <div class="teacher-lesson-section-header">

            <div class="teacher-lesson-section-icon purple">
                <i class="fas fa-align-right"></i>
            </div>

            <div>

                <h3>
                    {{ __('messages.lesson_content') }}
                </h3>

                <p>
                    {{ __('messages.lesson_content_description') }}
                </p>

            </div>

        </div>


        <div class="teacher-lesson-content-box">

            @if($lesson->content)

                {!! nl2br(e($lesson->content)) !!}

            @else

                <div class="teacher-lesson-empty-content">

                    <i class="fas fa-file-circle-xmark"></i>

                    <span>
                        {{ __('messages.no_lesson_content') }}
                    </span>

                </div>

            @endif

        </div>

    </div>



    {{-- =====================================================
         VIDEO
    ====================================================== --}}

    @if($lesson->video_path)

        <div class="teacher-lesson-card">

            <div class="teacher-lesson-section-header">

                <div class="teacher-lesson-section-icon blue">
                    <i class="fas fa-video"></i>
                </div>

                <div>

                    <h3>
                        {{ __('messages.lesson_video') }}
                    </h3>

                    <p>
                        {{ __('messages.lesson_video_view_description') }}
                    </p>

                </div>

            </div>


            <div class="teacher-lesson-video">

                <video
                    controls
                    width="100%"
                    preload="metadata">

                    <source
                        src="{{ asset('storage/' . $lesson->video_path) }}"
                        type="video/mp4">

                    {{ __('messages.video_not_supported') }}

                </video>

            </div>

        </div>

    @endif



   
{{-- =====================================================
     LESSON COMMENTS
===================================================== --}}

<div class="teacher-comments-section">

    {{-- Header --}}
    <div class="teacher-comments-header">

        <div class="teacher-comments-title">

            <div class="teacher-comments-icon">
                <i class="fas fa-comments"></i>
            </div>

            <div>

                <h2>
                    {{ __('messages.lesson_comments_title') }}
                </h2>

                <p>
                    {{ __('messages.lesson_comments_teacher_subtitle') }}
                </p>

            </div>

        </div>


        <div class="teacher-comments-count">

            <i class="fas fa-comment-dots"></i>

            {{ $comments->count() }}

        </div>

    </div>


    {{-- Comments List --}}
    <div class="teacher-comments-list">

        @forelse($comments as $comment)

            <div class="teacher-comment-card">

                {{-- Student Comment --}}
                <div class="teacher-comment-main">

                    <div class="teacher-comment-avatar">

                        @if($comment->user && $comment->user->profile_image)

                            <img
                                src="{{ asset('storage/' . $comment->user->profile_image) }}"
                                alt="{{ $comment->user->name }}"
                            >

                        @else

                            <i class="fas fa-user-graduate"></i>

                        @endif

                    </div>


                    <div class="teacher-comment-body">

                        <div class="teacher-comment-top">

                            <div class="teacher-comment-author">

                                {{ $comment->user->name }}

                                <span class="student-badge">
                                    {{ __('messages.student') }}
                                </span>

                            </div>


                            <div class="teacher-comment-date">

                                {{ $comment->created_at->diffForHumans() }}

                            </div>

                        </div>


                        {{-- نص تعليق الطالب --}}
                        <div class="teacher-comment-text">

                            {{ $comment->comment }}

                        </div>

                    </div>

                </div>


                {{-- Existing Replies --}}
                @foreach($comment->replies as $reply)

                    <div class="teacher-existing-reply">

                        <div class="teacher-existing-reply-content">

                            <div class="teacher-reply-avatar-small">

                                @if($reply->user && $reply->user->profile_image)

                                    <img
                                        src="{{ asset('storage/' . $reply->user->profile_image) }}"
                                        alt="{{ $reply->user->name }}"
                                    >

                                @else

                                    <i class="fas fa-chalkboard-user"></i>

                                @endif

                            </div>


                            <div class="teacher-existing-reply-body">

                                <div class="teacher-existing-reply-top">

                                    <div class="teacher-existing-reply-author">

                                        <i class="fas fa-chalkboard-user"></i>

                                        {{ $reply->user->name }}

                                        <span>
                                            {{ __('messages.teacher_reply') }}
                                        </span>

                                    </div>


                                    <div class="teacher-existing-reply-date">

                                        {{ $reply->created_at->diffForHumans() }}

                                    </div>

                                </div>


                                {{-- عرض الرد --}}
                                <div
                                    class="teacher-reply-display"
                                    id="teacher-reply-display-{{ $reply->id }}"
                                >

                                    <div class="teacher-existing-reply-text">

                                        {{ $reply->comment }}

                                    </div>


                                    {{-- أزرار المعلم على رده فقط --}}
                                    @if(auth()->id() === $reply->user_id)

                                        <div class="teacher-comment-actions">

                                            {{-- تعديل --}}
                                            <button
                                                type="button"
                                                class="teacher-edit-comment-btn"
                                                onclick="editTeacherReply({{ $reply->id }})"
                                            >

                                                <i class="fas fa-pen"></i>

                                                <span>تعديل</span>

                                            </button>


                                            {{-- حذف --}}
                                            <form
                                                method="POST"
                                                action="{{ route('lesson.comments.destroy', $reply->id) }}"
                                                onsubmit="return confirm('هل أنت متأكد من حذف الرد؟')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="teacher-delete-comment-btn"
                                                >

                                                    <i class="fas fa-trash"></i>

                                                    <span>حذف</span>

                                                </button>

                                            </form>

                                        </div>

                                    @endif

                                </div>


                                {{-- صندوق تعديل الرد --}}
                                @if(auth()->id() === $reply->user_id)

                                    <div
                                        class="teacher-reply-edit-box"
                                        id="teacher-reply-edit-{{ $reply->id }}"
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
                                                rows="3"
                                                maxlength="2000"
                                                required
                                            >{{ $reply->comment }}</textarea>


                                            <div class="teacher-edit-actions">

                                                <button
                                                    type="submit"
                                                    class="teacher-save-edit-btn"
                                                >

                                                    <i class="fas fa-check"></i>

                                                    <span>حفظ التعديل</span>

                                                </button>


                                                <button
                                                    type="button"
                                                    class="teacher-cancel-edit-btn"
                                                    onclick="cancelTeacherReplyEdit({{ $reply->id }})"
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


                {{-- Reply Form --}}
                <div class="teacher-reply-form-wrapper">

                    <form
                        method="POST"
                        action="{{ route('lesson.comments.reply', $comment->id) }}"
                        class="teacher-reply-form"
                    >

                        @csrf

                        <div class="teacher-reply-input-wrapper">

                            <i class="fas fa-reply"></i>

                            <textarea
                                name="comment"
                                rows="2"
                                maxlength="2000"
                                placeholder="{{ __('messages.teacher_reply_placeholder') }}"
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="teacher-reply-btn"
                        >

                            <i class="fas fa-paper-plane"></i>

                            <span>
                                {{ __('messages.send_reply') }}
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="teacher-no-comments-card">

                <div class="teacher-no-comments-icon">

                    <i class="far fa-comments"></i>

                </div>

                <h3>
                    {{ __('messages.no_comments_yet') }}
                </h3>

                <p>
                    {{ __('messages.no_comments_teacher') }}
                </p>

            </div>

        @endforelse

    </div>

</div>


{{-- =====================================================
     TEACHER COMMENT EDIT JAVASCRIPT
===================================================== --}}

<script>

function editTeacherReply(id)
{
    const displayBox =
        document.getElementById('teacher-reply-display-' + id);

    const editBox =
        document.getElementById('teacher-reply-edit-' + id);

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


function cancelTeacherReplyEdit(id)
{
    const displayBox =
        document.getElementById('teacher-reply-display-' + id);

    const editBox =
        document.getElementById('teacher-reply-edit-' + id);

    if (!displayBox || !editBox) {
        return;
    }

    editBox.style.display = 'none';

    displayBox.style.display = 'block';
}

</script>


{{-- =====================================================
     TEACHER COMMENT ACTIONS CSS
===================================================== --}}

<style>

.teacher-comment-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 9px;
}

.teacher-comment-actions form {
    margin: 0;
}


.teacher-edit-comment-btn,
.teacher-delete-comment-btn {
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


.teacher-edit-comment-btn {
    background: #F3EEFF;
    color: #6D28D9;
}

.teacher-edit-comment-btn:hover {
    background: #E9DFFF;
    color: #5B21B6;
    transform: translateY(-1px);
}


.teacher-delete-comment-btn {
    background: #FEF2F2;
    color: #DC2626;
}

.teacher-delete-comment-btn:hover {
    background: #FEE2E2;
    color: #B91C1C;
    transform: translateY(-1px);
}


.teacher-edit-comment-btn i,
.teacher-delete-comment-btn i {
    font-size: 10px;
}


.teacher-reply-edit-box {
    margin-top: 10px;
    width: 100%;
}


.teacher-reply-edit-box textarea {
    width: 100%;
    box-sizing: border-box;
    min-height: 80px;
    padding: 10px 12px;
    border: 1px solid #E5DDF3;
    border-radius: 10px;
    outline: none;
    resize: vertical;
    font-family: inherit;
    font-size: 12px;
    color: #352E3E;
    background: #FFFFFF;
}


.teacher-reply-edit-box textarea:focus {
    border-color: #8B5CF6;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, .10);
}


.teacher-edit-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
}


.teacher-save-edit-btn,
.teacher-cancel-edit-btn {
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


.teacher-save-edit-btn {
    background: linear-gradient(135deg, #6D28D9, #8B5CF6);
    color: white;
}

.teacher-save-edit-btn:hover {
    transform: translateY(-1px);
}


.teacher-cancel-edit-btn {
    background: #F3F4F6;
    color: #6B7280;
}

.teacher-cancel-edit-btn:hover {
    background: #E5E7EB;
}


@media (max-width: 650px) {

    .teacher-comment-actions {
        flex-wrap: wrap;
    }

    .teacher-edit-actions {
        flex-wrap: wrap;
    }

}

</style>

    {{-- =====================================================
         BACK
    ====================================================== --}}

    <div class="teacher-lesson-back">

        <a
            href="{{ route(
                'teacher.courses.show',
                $lesson->course_id
            ) }}"
            class="lesson-back-btn">

            <i class="fas fa-arrow-right"></i>

            {{ __('messages.back_to_course') }}

        </a>

    </div>


</div>

@endsection
