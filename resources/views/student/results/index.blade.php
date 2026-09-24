@extends('student.layouts.app')

@section('title', __('messages.my_results'))

@section('content')

<div class="student-results-page">

    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="results-page-header">

        <div class="results-header-content">

            <div class="results-header-icon">

                <i class="fas fa-chart-line"></i>

            </div>

            <div>

                <div class="results-header-label">

                    <i class="fas fa-award"></i>

                    {{ __('messages.academic_performance') }}

                </div>

                <h2>

                    {{ __('messages.my_results') }}

                </h2>

                <p>

                    {{ __('messages.results_description') }}

                </p>

            </div>

        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="results-stats-grid">


        {{-- Solved --}}

        <div class="results-stat-card">

            <div class="results-stat-icon purple">

                <i class="fas fa-clipboard-check"></i>

            </div>

            <div>

                <span class="results-stat-label">

                    {{ __('messages.solved_quizzes') }}

                </span>

                <strong>

                    {{ $totalSolved }}

                </strong>

                <small>

                    {{ __('messages.quiz') }}

                </small>

            </div>

        </div>



        {{-- Average --}}

        <div class="results-stat-card">

            <div class="results-stat-icon blue">

                <i class="fas fa-chart-pie"></i>

            </div>

            <div>

                <span class="results-stat-label">

                    {{ __('messages.average_results') }}

                </span>

                <strong>

                    {{ $averageScore }}%

                </strong>

                <small>

                    {{ __('messages.average_performance') }}

                </small>

            </div>

        </div>



        {{-- Best --}}

        <div class="results-stat-card">

            <div class="results-stat-icon green">

                <i class="fas fa-trophy"></i>

            </div>

            <div>

                <span class="results-stat-label">

                    {{ __('messages.best_result') }}

                </span>

                <strong>

                    {{ $bestScore }}%

                </strong>

                <small>

                    {{ __('messages.best_performance') }}

                </small>

            </div>

        </div>


    </div>



    {{-- =====================================================
         RESULTS LIST
    ====================================================== --}}

    @if($results->count())


        <div class="results-section-header">

            <div>

                <div class="results-section-label">

                    <i class="fas fa-list-check"></i>

                    {{ __('messages.quiz_history') }}

                </div>

                <h3>

                    {{ __('messages.latest_results') }}

                </h3>

                <p>

                    {{ __('messages.all_attempts_scores') }}

                </p>

            </div>


            <div class="results-total-badge">

                {{ $results->count() }}

                {{ __('messages.result') }}

            </div>

        </div>



        <div class="results-list">


            @foreach($results as $result)

                @php

                    $totalQuestions =
                        $result->quiz->questions->count();

                    $percentage = 0;

                    if($totalQuestions > 0){

                        $percentage = round(
                            ($result->score / $totalQuestions) * 100
                        );

                    }

                    if($percentage >= 80){

                        $status = __('messages.excellent');

                        $statusClass = 'excellent';

                        $statusIcon = 'fa-star';

                    } elseif($percentage >= 60){

                        $status = __('messages.good');

                        $statusClass = 'good';

                        $statusIcon = 'fa-circle-check';

                    } else {

                        $status = __('messages.needs_improvement');

                        $statusClass = 'needs-improvement';

                        $statusIcon = 'fa-chart-line';

                    }

                @endphp



                <div class="result-card">


                    {{-- Result Top --}}

                    <div class="result-card-top">


                        <div class="result-title-area">


                            <div class="result-quiz-icon">

                                <i class="fas fa-clipboard-check"></i>

                            </div>


                            <div>

                                <h4>

                                    {{ $result->quiz->title }}

                                </h4>

                                <p>

                                    <i class="fas fa-book-open"></i>

                                    {{ $result->quiz->course->title }}

                                </p>

                            </div>


                        </div>



                        <div class="result-attempt-badge">

                            {{ __('messages.attempt_number_label', [
                                'number' => $result->attempt_number
                            ]) }}

                        </div>


                    </div>



                    {{-- Result Details --}}

                    <div class="result-details">


                        <div class="result-detail">

                            <span>

                                <i class="fas fa-bullseye"></i>

                                {{ __('messages.score_label') }}

                            </span>

                            <strong>

                                {{ $result->score }}

                                <small>

                                    /

                                    {{ $totalQuestions }}

                                </small>

                            </strong>

                        </div>



                        <div class="result-detail">

                            <span>

                                <i class="fas fa-chart-simple"></i>

                                {{ __('messages.percentage') }}

                            </span>

                            <strong class="result-percentage">

                                {{ $percentage }}%

                            </strong>

                        </div>



                        <div class="result-detail">

                            <span>

                                <i class="fas fa-calendar-days"></i>

                                {{ __('messages.solved_date') }}

                            </span>

                            <strong class="result-date">

                                {{ $result->created_at->format('Y-m-d') }}

                            </strong>

                        </div>


                    </div>



                    {{-- Progress --}}

                    <div class="result-progress-section">


                        <div class="result-progress-header">

                            <span>

                                {{ __('messages.result_level') }}

                            </span>

                            <strong>

                                {{ $percentage }}%

                            </strong>

                        </div>


                        <div class="result-progress">

                            <div
                                class="result-progress-bar
                                {{ $statusClass }}"
                                style="width: {{ $percentage }}%;">
                            </div>

                        </div>


                    </div>



                    {{-- Bottom --}}

                    <div class="result-card-bottom">


                        <div class="result-status {{ $statusClass }}">

                            <i class="fas {{ $statusIcon }}"></i>

                            {{ $status }}

                        </div>


                        <a
                            href="/attempts/{{ $result->id }}"
                            class="result-details-btn">

                            {{ __('messages.view_attempt_details') }}

                            <i class="fas fa-arrow-left"></i>

                        </a>


                    </div>


                </div>


            @endforeach


        </div>


    @else


        {{-- =================================================
             EMPTY STATE
        ================================================== --}}

        <div class="results-empty-state">


            <div class="results-empty-icon">

                <i class="fas fa-chart-line"></i>

            </div>


            <h3>

                {{ __('messages.no_results_yet') }}

            </h3>


            <p>

                {{ __('messages.no_results_description') }}

            </p>


            <a
                href="/courses"
                class="results-empty-btn">

                <i class="fas fa-book-open"></i>

                {{ __('messages.explore_courses') }}

            </a>


        </div>


    @endif

</div>

@endsection
