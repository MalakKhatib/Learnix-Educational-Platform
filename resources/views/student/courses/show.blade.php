@extends('student.layouts.app')

@section('title', $course->title)

@section('content')

<div class="course-details-page">


    {{-- =====================================================
         COURSE HERO
    ====================================================== --}}

    <div class="course-details-hero">

        <div class="course-hero-content">

            <div class="course-hero-label">

                <i class="fas fa-book-open"></i>

                {{ __('messages.course_details') }}

            </div>


            <h1>

                {{ $course->title }}

            </h1>


            @if($course->category)

                <div class="course-hero-category">

                    <i class="fas {{ $course->category->icon ?? 'fa-book' }}"></i>

                    {{ $course->category->name }}

                </div>

            @endif


            <p class="course-hero-description">

                {{ $course->description }}

            </p>


            <div class="course-hero-teacher">

                <div class="course-detail-avatar">

                    {{ mb_substr(
                        $course->teacher->name,
                        0,
                        1
                    ) }}

                </div>


                <div>

                    <span>

                        {{ __('messages.provided_by') }}

                    </span>

                    <strong>

                        {{ $course->teacher->name }}

                    </strong>

                </div>

            </div>

        </div>


        <div class="course-hero-icon">

            <i class="fas fa-graduation-cap"></i>

        </div>

    </div>



    {{-- =====================================================
         COURSE SUMMARY
    ====================================================== --}}

    <div class="course-summary-grid">

        {{-- عدد الدروس --}}

        <div class="course-summary-card">

            <div class="summary-icon purple">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <strong>
                    {{ $totalLessons }}
                </strong>

                <span>
                    {{ __('messages.lesson_count') }}
                </span>

            </div>

        </div>


        {{-- الدروس المكتملة --}}

        <div class="course-summary-card">

            <div class="summary-icon green">

                <i class="fas fa-circle-check"></i>

            </div>

            <div>

                <strong>
                    {{ $completedLessons }}
                </strong>

                <span>
                    {{ __('messages.completed_lesson') }}
                </span>

            </div>

        </div>


        {{-- الدروس المتبقية --}}

        <div class="course-summary-card">

            <div class="summary-icon orange">

                <i class="fas fa-clock"></i>

            </div>

            <div>

                <strong>
                    {{ $remainingLessons }}
                </strong>

                <span>
                    {{ __('messages.remaining_lesson') }}
                </span>

            </div>

        </div>


        {{-- نسبة الإنجاز --}}

        <div class="course-summary-card">

            <div class="summary-icon blue">

                <i class="fas fa-chart-line"></i>

            </div>

            <div>

                <strong>
                    {{ $progressPercentage }}%
                </strong>

                <span>
                    {{ __('messages.progress_percentage') }}
                </span>

            </div>

        </div>


        {{-- نسبة الحضور --}}

        <div class="course-summary-card">

            <div class="summary-icon purple">

                <i class="fas fa-user-check"></i>

            </div>

            <div>

                <strong>
                    {{ $attendancePercentage }}%
                </strong>

                <span>
                    {{ __('messages.attendance_percentage') }}
                </span>

            </div>

        </div>


    </div>


    <div class="course-progress-box">

        <div class="progress-header">

            <span>
                {{ __('messages.course_progress') }}
            </span>

            <strong>
                {{ $progressPercentage }}%
            </strong>

        </div>

        <div class="progress-bar">

            <div class="progress-fill"
                 style="width: {{ $progressPercentage }}%;">
            </div>

        </div>

        <div class="progress-info">

            <span>

                {{ __('messages.completed_from', [
                    'completed' => $completedLessons,
                    'total' => $totalLessons
                ]) }}

            </span>

            <span>

                {{ __('messages.remaining_from', [
                    'remaining' => $remainingLessons
                ]) }}

            </span>

        </div>

    </div>


{{-- =====================================================
     CERTIFICATE
====================================================== --}}

@if($progressPercentage >= 100)

    <div class="certificate-card">

        <div class="certificate-card-icon">
            <i class="fas fa-certificate"></i>
        </div>

        <div class="certificate-card-content">

            <h3>
                مبروك! لقد أتممت الكورس 🎉
            </h3>

            <p>
                يمكنك الآن تحميل شهادة إتمام الكورس.
            </p>

        </div>

        <a
            href="{{ route('certificate.download', $course->id) }}"
            class="certificate-download-btn"
        >
            <i class="fas fa-download"></i>

            <span>
                تحميل الشهادة
            </span>
        </a>

    </div>

@endif

    {{-- =====================================================
         LESSONS
    ====================================================== --}}

    <div class="course-content-card">

        <div class="course-content-header">

            <div>

                <div class="content-label">

                    <i class="fas fa-book-open"></i>

                    {{ __('messages.course_content') }}

                </div>

                <h3>

                    {{ __('messages.lessons') }}

                </h3>

                <p>

                    {{ __('messages.start_studying') }}

                </p>

            </div>


            <div class="content-count">

                {{ $totalLessons }}

            </div>

        </div>


        <div class="course-items-list">

            @forelse(
                $course->lessons
                as $index => $lesson
            )

                <div class="course-content-item">

                    {{-- رقم الدرس --}}

                    <div class="content-number">

                        {{ $index + 1 }}

                    </div>


                    {{-- أيقونة الدرس --}}

                    <div class="content-item-icon">

                        @if(in_array($lesson->id, $completedLessonIds))

                            <i class="fas fa-circle-check"></i>

                        @else

                            <i class="fas fa-book"></i>

                        @endif

                    </div>


                    {{-- معلومات الدرس --}}

                    <div class="content-item-info">

                        <h4>

                            {{ $lesson->title }}

                        </h4>


                        <p>

                            {{ Str::limit(
                                $lesson->content,
                                95
                            ) }}

                        </p>


                        {{-- حالة الدرس --}}

                        @if(in_array($lesson->id, $completedLessonIds))

                            <span class="lesson-status completed">

                                <i class="fas fa-circle-check"></i>

                                {{ __('messages.completed') }}

                            </span>

                        @else

                            <span class="lesson-status not-completed">

                                <i class="fas fa-clock"></i>

                                {{ __('messages.not_completed') }}

                            </span>

                        @endif

                    </div>


                    {{-- زر الدخول --}}

                    <a
                        href="/lessons/{{ $lesson->id }}"
                        class="content-action lesson-action">

                        <span>

                            @if(in_array($lesson->id, $completedLessonIds))

                                {{ __('messages.review_lesson') }}

                            @else

                                {{ __('messages.enter_lesson') }}

                            @endif

                        </span>

                        <i class="fas fa-arrow-left"></i>

                    </a>

                </div>

            @empty

                <div class="course-empty-state">

                    <div class="course-empty-icon">

                        <i class="fas fa-book-open"></i>

                    </div>

                    <h4>

                        {{ __('messages.no_lessons') }}

                    </h4>

                    <p>

                        {{ __('messages.no_lessons_added') }}

                    </p>

                </div>

            @endforelse

        </div>

    </div>


    {{-- =====================================================
         QUIZZES
    ====================================================== --}}

    <div class="course-content-card quizzes-card">

        <div class="course-content-header">

            <div>

                <div class="content-label quizzes-label">

                    <i class="fas fa-clipboard-check"></i>

                    {{ __('messages.assess_your_level') }}

                </div>

                <h3>

                    {{ __('messages.quizzes') }}

                </h3>

                <p>

                    {{ __('messages.quiz_description') }}

                </p>

            </div>


            <div class="content-count quiz-count">

                {{ $course->quizzes->count() }}

            </div>

        </div>


        <div class="course-items-list">

            @forelse(
                $course->quizzes
                as $quiz
            )

                <div class="course-content-item quiz-item">

                    <div class="content-item-icon quiz-icon">

                        <i class="fas fa-clipboard-check"></i>

                    </div>


                    <div class="content-item-info">

                        <h4>

                            {{ $quiz->title }}

                        </h4>

                        <p>

                            {{ __('messages.question_count') }}

                            {{ $quiz->questions->count() }}

                            {{ __('messages.question') }}

                        </p>

                    </div>


                    <a
                        href="/quizzes/{{ $quiz->id }}"
                        class="content-action quiz-action">

                        <span>

                            {{ __('messages.start_quiz') }}

                        </span>

                        <i class="fas fa-arrow-left"></i>

                    </a>

                </div>

            @empty

                <div class="course-empty-state">

                    <div class="course-empty-icon quiz-empty-icon">

                        <i class="fas fa-clipboard-list"></i>

                    </div>

                    <h4>

                        {{ __('messages.no_quizzes') }}

                    </h4>

                    <p>

                        {{ __('messages.no_quizzes_added') }}

                    </p>

                </div>

            @endforelse

        </div>

    </div>


</div>

@endsection
