@extends('student.layouts.app')

@section('title', __('messages.attempts'))

@section('content')

<div class="student-attempts-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="student-attempts-header">

        <div class="student-attempts-header-content">

            <div class="student-attempts-icon">

                <i class="fas fa-clipboard-check"></i>

            </div>

            <div>

                <div class="student-attempts-label">

                    <i class="fas fa-chart-line"></i>

                    {{ __('messages.quiz_results') }}

                </div>

                <h2>
                    {{ __('messages.attempts') }}
                </h2>

                <p>
                    {{ __('messages.all_attempts') }}
                    <strong>{{ $quiz->title }}</strong>
                </p>

            </div>

        </div>


        <a
            href="/quizzes/{{ $quiz->id }}"
            class="student-attempts-back-btn">

            <i class="fas fa-arrow-right"></i>

            {{ __('messages.back_to_quiz') }}

        </a>

    </div>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="student-attempts-summary">

        <div class="student-attempt-summary-item">

            <div class="student-attempt-summary-icon purple">

                <i class="fas fa-list-ol"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.attempt_count') }}
                </span>

                <strong>
                    {{ $attempts->count() }}
                </strong>

            </div>

        </div>


        <div class="student-attempt-summary-item">

            <div class="student-attempt-summary-icon green">

                <i class="fas fa-trophy"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.best_score') }}
                </span>

                <strong>
                    {{ $attempts->max('score') ?? 0 }}
                </strong>

            </div>

        </div>

    </div>



    {{-- =====================================================
         ATTEMPTS
    ====================================================== --}}

    <div class="student-attempts-card">


        <div class="student-attempts-card-header">

            <div>

                <div class="student-attempts-section-label">

                    <i class="fas fa-clock-rotate-left"></i>

                    {{ __('messages.attempt_history') }}

                </div>

                <h3>
                    {{ __('messages.previous_attempts') }}
                </h3>

            </div>

            <span class="student-attempts-count">

                {{ $attempts->count() }}

                {{ __('messages.attempt') }}

            </span>

        </div>



        @forelse($attempts as $attempt)

            <div class="student-attempt-item">


                <div class="student-attempt-number">

                    #{{ $attempt->attempt_number }}

                </div>


                <div class="student-attempt-icon">

                    <i class="fas fa-clipboard-check"></i>

                </div>


                <div class="student-attempt-info">

                    <strong>

                        {{ __('messages.attempt_number') }}

                        {{ $attempt->attempt_number }}

                    </strong>

                    <span>

                        {{ __('messages.score_label') }}

                        {{ $attempt->score }}

                    </span>

                </div>


                <a
                    href="/attempts/{{ $attempt->id }}"
                    class="student-attempt-details-btn">

                    <span>
                        {{ __('messages.view_details') }}
                    </span>

                    <i class="fas fa-arrow-left"></i>

                </a>

            </div>

        @empty


            <div class="student-attempts-empty">

                <div class="student-attempts-empty-icon">

                    <i class="fas fa-clipboard-list"></i>

                </div>

                <h4>
                    {{ __('messages.no_attempts_yet') }}
                </h4>

                <p>
                    {{ __('messages.no_attempts_message') }}
                </p>

                <a
                    href="/quizzes/{{ $quiz->id }}"
                    class="student-attempts-start-btn">

                    <i class="fas fa-play"></i>

                    {{ __('messages.start_quiz') }}

                </a>

            </div>

        @endforelse


    </div>


</div>

@endsection
