@extends('student.layouts.app')

@section('title', __('messages.dashboard'))

@section('content')

{{-- =====================================================
     WELCOME
===================================================== --}}

<div class="student-welcome-card">

    <div class="welcome-content">

        <div class="welcome-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div>

            <div class="welcome-small">
                {{ __('messages.welcome_student') }}
            </div>

            <h2>
                {{ auth()->user()->name }}
            </h2>

            <p>
                {{ __('messages.keep_learning') }}
            </p>

            <div class="welcome-goal">
                <i class="fas fa-bullseye"></i>
                {{ __('messages.every_step') }}
            </div>

        </div>

    </div>

    <div class="welcome-decoration">
        <i class="fas fa-graduation-cap"></i>
    </div>

</div>


{{-- =====================================================
     STATISTICS
===================================================== --}}

<div class="student-stats-grid">


    {{-- My Courses --}}

    <div class="student-stat-card">

        <div class="stat-icon purple">
            <i class="fas fa-book-open"></i>
        </div>

        <div class="stat-label">
            {{ __('messages.my_courses') }}
        </div>

        <div class="stat-number">
            {{ $totalCourses }}
        </div>

        <div class="stat-description">
            {{ __('messages.registered_courses') }}
        </div>

    </div>


    {{-- Solved Quizzes --}}

    <div class="student-stat-card">

        <div class="stat-icon green">
            <i class="fas fa-clipboard-check"></i>
        </div>

        <div class="stat-label">
            {{ __('messages.solved_quizzes') }}
        </div>

        <div class="stat-number">
            {{ $totalQuizzes }}
        </div>

        <div class="stat-description">
            {{ __('messages.completed_quiz') }}
        </div>

    </div>


    {{-- Completed Lessons --}}

    <div class="student-stat-card">

        <div class="stat-icon orange">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div class="stat-label">
            {{ __('messages.completed_lessons') }}
        </div>

        <div
            class="stat-number"
            id="completedLessonsNumber"
        >
            {{ $completedLessons }}
        </div>

        <div class="stat-description">
            {{ __('messages.completed_lesson') }}
        </div>

    </div>


    {{-- Average --}}

    <div class="student-stat-card">

        <div class="stat-icon blue">
            <i class="fas fa-chart-line"></i>
        </div>

        <div class="stat-label">
            {{ __('messages.average_results') }}
        </div>

        <div class="stat-number">
            {{ $averageScore }}%
        </div>

        <div class="stat-description">
            {{ __('messages.average_performance') }}
        </div>

    </div>

</div>


{{-- =====================================================
     PROGRESS + QUICK ACCESS
===================================================== --}}

<div class="dashboard-grid">


    {{-- =================================================
         GENERAL PROGRESS
    ================================================== --}}

    <div class="dashboard-card progress-card">

        <div class="dashboard-card-header">

            <div>

                <h4>
                    {{ __('messages.overall_progress') }}
                </h4>

                <p>
                    {{ __('messages.continue_goals') }}
                </p>

            </div>

            <div class="header-icon">
                <i class="fas fa-bullseye"></i>
            </div>

        </div>


        <div class="progress-content">


            {{-- Progress Circle --}}

            <div
                class="progress-circle"
                id="progressCircle"
                style="--progress: {{ $percentage }};"
            >

                <div class="progress-circle-inner">

                    <strong id="progressPercentage">
                        {{ $percentage }}%
                    </strong>

                    <span>
                        {{ __('messages.progress_percentage') }}
                    </span>

                </div>

            </div>


            {{-- Progress Details --}}

            <div class="progress-details">


                {{-- Completed --}}

                <div class="progress-item">

                    <div class="progress-item-top">

                        <span>

                            <i class="fas fa-circle completed-dot"></i>

                            {{ __('messages.completed') }}

                        </span>

                        <strong id="completedPercentage">
                            {{ $completedPercentage }}%
                        </strong>

                    </div>


                    <div class="mini-progress">

                        <div
                            class="mini-progress-bar"
                            id="completedProgressBar"
                            style="width: {{ $completedPercentage }}%;"
                        ></div>

                    </div>

                </div>


                {{-- In Progress --}}

                <div class="progress-item">

                    <div class="progress-item-top">

                        <span>

                            <i class="fas fa-circle learning-dot"></i>

                            {{ __('messages.in_progress') }}

                        </span>

                        <strong id="inProgressPercentage">
                            {{ $inProgressPercentage }}%
                        </strong>

                    </div>


                    <div class="mini-progress">

                        <div
                            class="mini-progress-bar learning"
                            id="inProgressProgressBar"
                            style="width: {{ $inProgressPercentage }}%;"
                        ></div>

                    </div>

                </div>


                {{-- Not Started --}}

                <div class="progress-item">

                    <div class="progress-item-top">

                        <span>

                            <i class="fas fa-circle not-started-dot"></i>

                            {{ __('messages.not_started') }}

                        </span>

                        <strong id="notStartedPercentage">
                            {{ $notStartedPercentage }}%
                        </strong>

                    </div>


                    <div class="mini-progress">

                        <div
                            class="mini-progress-bar not-started"
                            id="notStartedProgressBar"
                            style="width: {{ $notStartedPercentage }}%;"
                        ></div>

                    </div>

                </div>


            </div>

        </div>

    </div>


    {{-- =================================================
         QUICK ACCESS
    ================================================== --}}

    <div class="dashboard-card quick-card">

        <div class="dashboard-card-header">

            <div>

                <h4>
                    {{ __('messages.quick_access') }}
                </h4>

                <p>
                    {{ __('messages.quick_access_description') }}
                </p>

            </div>

            <div class="header-icon">
                <i class="fas fa-bolt"></i>
            </div>

        </div>


        <div class="quick-links">


            <a
                href="{{ url('/courses') }}"
                class="quick-link"
            >

                <span class="quick-link-icon purple-bg">
                    <i class="fas fa-book-open"></i>
                </span>

                <span>
                    {{ __('messages.all_courses') }}
                </span>

                <i class="fas fa-chevron-left arrow"></i>

            </a>


            <a
                href="{{ url('/my-courses') }}"
                class="quick-link"
            >

                <span class="quick-link-icon blue-bg">
                    <i class="fas fa-graduation-cap"></i>
                </span>

                <span>
                    {{ __('messages.my_courses') }}
                </span>

                <i class="fas fa-chevron-left arrow"></i>

            </a>


            <a
                href="{{ url('/student/results') }}"
                class="quick-link"
            >

                <span class="quick-link-icon green-bg">
                    <i class="fas fa-chart-line"></i>
                </span>

                <span>
                    {{ __('messages.my_results') }}
                </span>

                <i class="fas fa-chevron-left arrow"></i>

            </a>


            <a
                href="{{ url('/profile') }}"
                class="quick-link"
            >

                <span class="quick-link-icon orange-bg">
                    <i class="fas fa-user"></i>
                </span>

                <span>
                    {{ __('messages.profile') }}
                </span>

                <i class="fas fa-chevron-left arrow"></i>

            </a>


        </div>

    </div>

</div>


{{-- =====================================================
     LATEST COURSES + QUIZZES
===================================================== --}}

<div class="dashboard-grid latest-grid">


    {{-- =================================================
         LATEST COURSES
    ================================================== --}}

    <div class="dashboard-card">

        <div class="dashboard-card-header">

            <div>

                <h4>
                    {{ __('messages.latest_courses') }}
                </h4>

                <p>
                    {{ __('messages.latest_courses_description') }}
                </p>

            </div>

            <a
                href="{{ url('/my-courses') }}"
                class="view-all"
            >
                {{ __('messages.view_all') }}
            </a>

        </div>


        <div class="latest-list">

            @forelse($latestCourses as $course)

                <a
                    href="{{ url('/courses/' . $course->id) }}"
                    class="latest-item"
                    style="text-decoration: none;"
                >

                    <div class="latest-icon purple-bg">

                        <i class="fas fa-book"></i>

                    </div>


                    <div class="latest-info">

                        <strong>
                            {{ $course->title }}
                        </strong>

                        <span>
                            {{ __('messages.educational_course') }}
                        </span>

                    </div>


                    <i class="fas fa-chevron-left latest-arrow"></i>

                </a>

            @empty

                <div class="empty-state">

                    <i class="fas fa-book-open"></i>

                    <p>
                        {{ __('messages.no_courses_yet') }}
                    </p>

                    <a href="{{ url('/courses') }}">
                        {{ __('messages.explore_courses') }}
                    </a>

                </div>

            @endforelse

        </div>

    </div>


    {{-- =================================================
         LATEST QUIZZES
    ================================================== --}}

    <div class="dashboard-card">

        <div class="dashboard-card-header">

            <div>

                <h4>
                    {{ __('messages.latest_quizzes') }}
                </h4>

                <p>
                    {{ __('messages.latest_quizzes_description') }}
                </p>

            </div>

            <a
                href="{{ url('/student/results') }}"
                class="view-all"
            >
                {{ __('messages.view_results') }}
            </a>

        </div>


        <div class="latest-list">

            @forelse($latestAttempts as $attempt)

                @if($attempt->quiz)

                    <a
                        href="{{ url('/attempts/' . $attempt->id) }}"
                        class="latest-item"
                        style="text-decoration: none;"
                    >

                        <div class="latest-icon green-bg">

                            <i class="fas fa-clipboard-check"></i>

                        </div>


                        <div class="latest-info">

                            <strong>
                                {{ $attempt->quiz->title }}
                            </strong>

                            <span>
                                {{ __('messages.completed_quiz') }}
                            </span>

                        </div>


                        <i class="fas fa-chevron-left latest-arrow"></i>

                    </a>

                @endif

            @empty

                <div class="empty-state">

                    <i class="fas fa-clipboard-list"></i>

                    <p>
                        {{ __('messages.no_quizzes_yet') }}
                    </p>

                    <a href="{{ url('/courses') }}">
                        {{ __('messages.start_now') }}
                    </a>

                </div>

            @endforelse

        </div>

    </div>

</div>


{{-- =====================================================
     NO COURSES
===================================================== --}}

@if($totalCourses == 0)

    <div class="empty-learning-card">

        <div class="empty-learning-icon">

            <i class="fas fa-book-open"></i>

        </div>


        <div>

            <h4>
                {{ __('messages.no_registered_courses') }}
            </h4>

            <p>
                {{ __('messages.start_learning_message') }}
            </p>

        </div>


        <a
            href="{{ url('/courses') }}"
            class="empty-learning-btn"
        >

            {{ __('messages.explore_courses') }}

            <i class="fas fa-arrow-left"></i>

        </a>

    </div>

@endif


{{-- =====================================================
     LIVE PROGRESS UPDATE
===================================================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    let updating = false;

    function updateDashboardProgress() {

        if (updating) {
            return;
        }

        updating = true;

        fetch('{{ url('/student/dashboard') }}', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            },
            cache: 'no-store'
        })
        .then(function (response) {

            if (!response.ok) {
                throw new Error('Dashboard request failed');
            }

            return response.text();
        })
        .then(function (html) {

            const parser = new DOMParser();

            const documentFromResponse =
                parser.parseFromString(
                    html,
                    'text/html'
                );


            /*
            |--------------------------------------------------------------------------
            | Progress Circle
            |--------------------------------------------------------------------------
            */

            const newCircle =
                documentFromResponse.querySelector(
                    '#progressCircle'
                );

            const currentCircle =
                document.querySelector(
                    '#progressCircle'
                );

            if (newCircle && currentCircle) {

                const newProgress =
                    newCircle.style
                        .getPropertyValue('--progress');

                currentCircle.style.setProperty(
                    '--progress',
                    newProgress
                );
            }


            /*
            |--------------------------------------------------------------------------
            | General Percentage
            |--------------------------------------------------------------------------
            */

            const newPercentage =
                documentFromResponse.querySelector(
                    '#progressPercentage'
                );

            const currentPercentage =
                document.querySelector(
                    '#progressPercentage'
                );

            if (newPercentage && currentPercentage) {

                currentPercentage.textContent =
                    newPercentage.textContent;
            }


            /*
            |--------------------------------------------------------------------------
            | Completed Percentage
            |--------------------------------------------------------------------------
            */

            const newCompleted =
                documentFromResponse.querySelector(
                    '#completedPercentage'
                );

            const currentCompleted =
                document.querySelector(
                    '#completedPercentage'
                );

            if (newCompleted && currentCompleted) {

                currentCompleted.textContent =
                    newCompleted.textContent;
            }


            /*
            |--------------------------------------------------------------------------
            | In Progress Percentage
            |--------------------------------------------------------------------------
            */

            const newInProgress =
                documentFromResponse.querySelector(
                    '#inProgressPercentage'
                );

            const currentInProgress =
                document.querySelector(
                    '#inProgressPercentage'
                );

            if (newInProgress && currentInProgress) {

                currentInProgress.textContent =
                    newInProgress.textContent;
            }


            /*
            |--------------------------------------------------------------------------
            | Not Started Percentage
            |--------------------------------------------------------------------------
            */

            const newNotStarted =
                documentFromResponse.querySelector(
                    '#notStartedPercentage'
                );

            const currentNotStarted =
                document.querySelector(
                    '#notStartedPercentage'
                );

            if (newNotStarted && currentNotStarted) {

                currentNotStarted.textContent =
                    newNotStarted.textContent;
            }


            /*
            |--------------------------------------------------------------------------
            | Completed Progress Bar
            |--------------------------------------------------------------------------
            */

            const newCompletedBar =
                documentFromResponse.querySelector(
                    '#completedProgressBar'
                );

            const currentCompletedBar =
                document.querySelector(
                    '#completedProgressBar'
                );

            if (newCompletedBar && currentCompletedBar) {

                currentCompletedBar.style.width =
                    newCompletedBar.style.width;
            }


            /*
            |--------------------------------------------------------------------------
            | In Progress Bar
            |--------------------------------------------------------------------------
            */

            const newInProgressBar =
                documentFromResponse.querySelector(
                    '#inProgressProgressBar'
                );

            const currentInProgressBar =
                document.querySelector(
                    '#inProgressProgressBar'
                );

            if (newInProgressBar && currentInProgressBar) {

                currentInProgressBar.style.width =
                    newInProgressBar.style.width;
            }


            /*
            |--------------------------------------------------------------------------
            | Not Started Bar
            |--------------------------------------------------------------------------
            */

            const newNotStartedBar =
                documentFromResponse.querySelector(
                    '#notStartedProgressBar'
                );

            const currentNotStartedBar =
                document.querySelector(
                    '#notStartedProgressBar'
                );

            if (newNotStartedBar && currentNotStartedBar) {

                currentNotStartedBar.style.width =
                    newNotStartedBar.style.width;
            }


            /*
            |--------------------------------------------------------------------------
            | Completed Lessons Number
            |--------------------------------------------------------------------------
            */

            const newCompletedNumber =
                documentFromResponse.querySelector(
                    '#completedLessonsNumber'
                );

            const currentCompletedNumber =
                document.querySelector(
                    '#completedLessonsNumber'
                );

            if (
                newCompletedNumber &&
                currentCompletedNumber
            ) {

                currentCompletedNumber.textContent =
                    newCompletedNumber.textContent;
            }

        })
        .catch(function () {

            /*
            | في حال انقطع الاتصال لا نعمل أي شيء.
            | الداشبورد يبقى يعمل بشكل طبيعي.
            */

        })
        .finally(function () {

            updating = false;

        });
    }


    /*
    |--------------------------------------------------------------------------
    | تحديث كل 3 ثواني
    |--------------------------------------------------------------------------
    */

    setInterval(
        updateDashboardProgress,
        3000
    );

});
</script>

@endsection
