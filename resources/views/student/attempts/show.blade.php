@extends('student.layouts.app')

@section('title', 'تفاصيل المحاولة')

@section('content')

@php


$totalQuestions =
    $attempt->quiz->questions->count();

$percentage = 0;

if($totalQuestions > 0){

    $percentage = round(
        ($attempt->score / $totalQuestions) * 100
    );

}

if($percentage >= 80){

    $status = 'ممتاز';

    $statusClass = 'excellent';

    $statusIcon = 'fa-star';

}elseif($percentage >= 60){

    $status = 'جيد';

    $statusClass = 'good';

    $statusIcon = 'fa-circle-check';

}else{

    $status = 'يحتاج إلى تحسين';

    $statusClass = 'needs-improvement';

    $statusIcon = 'fa-chart-line';

}

@endphp


<div class="attempt-details-page">


    {{-- =====================================================
         BACK
    ====================================================== --}}

    <div class="attempt-back-row">

        <a
            href="/student/results"
            class="attempt-back-btn">

            <i class="fas fa-arrow-right"></i>

            العودة إلى النتائج

        </a>

    </div>



    {{-- =====================================================
         RESULT HERO
    ====================================================== --}}

    <div class="attempt-hero">

        <div class="attempt-hero-content">


            <div class="attempt-label">

                <i class="fas fa-chart-line"></i>

                تفاصيل نتيجة الاختبار

            </div>


            <h1>

                {{ $attempt->quiz->title }}

            </h1>


            <p>

                {{ $attempt->quiz->course->title }}

            </p>


            <div class="attempt-status {{ $statusClass }}">

                <i class="fas {{ $statusIcon }}"></i>

                {{ $status }}

            </div>

        </div>


        <div
    class="attempt-score-circle"
    style="--attempt-progress: {{ $percentage }};">

            <div>

                <strong>

                    {{ $percentage }}%

                </strong>

                <span>

                    النتيجة

                </span>

            </div>

        </div>

    </div>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="attempt-summary-grid">


        <div class="attempt-summary-card">

            <div class="attempt-summary-icon purple">

                <i class="fas fa-bullseye"></i>

            </div>

            <div>

                <span>

                    الدرجة

                </span>

                <strong>

                    {{ $attempt->score }}

                    <small>

                        /

                        {{ $totalQuestions }}

                    </small>

                </strong>

            </div>

        </div>


        <div class="attempt-summary-card">

            <div class="attempt-summary-icon green">

                <i class="fas fa-circle-check"></i>

            </div>

            <div>

                <span>

                    النتيجة

                </span>

                <strong>

                    {{ $percentage }}%

                </strong>

            </div>

        </div>


        <div class="attempt-summary-card">

            <div class="attempt-summary-icon blue">

                <i class="fas fa-hashtag"></i>

            </div>

            <div>

                <span>

                    رقم المحاولة

                </span>

                <strong>

                    #{{ $attempt->attempt_number }}

                </strong>

            </div>

        </div>


        <div class="attempt-summary-card">

            <div class="attempt-summary-icon orange">

                <i class="fas fa-calendar-days"></i>

            </div>

            <div>

                <span>

                    تاريخ الحل

                </span>

                <strong>

                    {{ $attempt->created_at->format('Y-m-d') }}

                </strong>

            </div>

        </div>


    </div>



    {{-- =====================================================
         PROGRESS
    ====================================================== --}}

    <div class="attempt-progress-card">

        <div class="attempt-progress-header">

            <div>

                <h3>

                    مستوى أدائك

                </h3>

                <p>

                    نسبة إجاباتك الصحيحة في هذا الاختبار.

                </p>

            </div>


            <strong>

                {{ $percentage }}%

            </strong>

        </div>


        <div class="attempt-progress">

            <div
                class="attempt-progress-bar {{ $statusClass }}"
                style="width: {{ $percentage }}%;">
            </div>

        </div>

    </div>



    {{-- =====================================================
         QUESTIONS REVIEW
    ====================================================== --}}

    <div class="attempt-review-header">

        <div>

            <div class="attempt-review-label">

                <i class="fas fa-list-check"></i>

                مراجعة الإجابات

            </div>


            <h3>

                تفاصيل إجاباتك

            </h3>


            <p>

                راجع إجاباتك وتعرّف على الإجابات الصحيحة.

            </p>

        </div>


        <div class="attempt-review-count">

            {{ $attempt->userAnswers->count() }}

            سؤال

        </div>

    </div>



    <div class="attempt-answers-list">


        @foreach($attempt->userAnswers as $index => $userAnswer)


            @php

                $correctAnswer =
                    $userAnswer->question
                        ->answers
                        ->where('is_correct', true)
                        ->first();

            @endphp


            <div class="attempt-answer-card">


                {{-- Header --}}

                <div class="attempt-question-header">


                    <div class="attempt-question-number">

                        {{ $index + 1 }}

                    </div>


                    <div class="attempt-question-text">

                        <span>

                            السؤال {{ $index + 1 }}

                        </span>


                        <h4>

                            {{ $userAnswer->question->question_text }}

                        </h4>

                    </div>


                    @if($userAnswer->is_correct)

                        <div class="question-result correct">

                            <i class="fas fa-check"></i>

                            صحيحة

                        </div>

                    @else

                        <div class="question-result wrong">

                            <i class="fas fa-xmark"></i>

                            خاطئة

                        </div>

                    @endif


                </div>



                {{-- User Answer --}}

                @if($userAnswer->is_correct)

                    <div class="answer-review correct-answer">

                        <div class="answer-review-icon">

                            <i class="fas fa-check"></i>

                        </div>


                        <div>

                            <span>

                                إجابتك

                            </span>

                            <strong>

                                {{ $userAnswer->answer->answer_text }}

                            </strong>

                        </div>

                    </div>


                @else

                    <div class="answer-review wrong-answer">

                        <div class="answer-review-icon">

                            <i class="fas fa-xmark"></i>

                        </div>


                        <div>

                            <span>

                                إجابتك

                            </span>

                            <strong>

                                {{ $userAnswer->answer->answer_text }}

                            </strong>

                        </div>

                    </div>



                    @if($correctAnswer)

                        <div class="answer-review correct-answer">

                            <div class="answer-review-icon">

                                <i class="fas fa-check"></i>

                            </div>


                            <div>

                                <span>

                                    الإجابة الصحيحة

                                </span>

                                <strong>

                                    {{ $correctAnswer->answer_text }}

                                </strong>

                            </div>

                        </div>

                    @endif

                @endif


            </div>


        @endforeach


    </div>



    {{-- =====================================================
         BOTTOM ACTION
    ====================================================== --}}

    <div class="attempt-bottom-action">

        <div>

            <div class="bottom-action-icon">

                <i class="fas fa-graduation-cap"></i>

            </div>

            <div>

                <h4>

                    استمر في التعلم

                </h4>

                <p>

                    راجع أخطاءك وحاول تحسين نتيجتك في المحاولة القادمة.

                </p>

            </div>

        </div>


        <a
            href="/student/results"
            class="back-results-btn">

            عرض النتائج

            <i class="fas fa-arrow-left"></i>

        </a>

    </div>


</div>

@endsection
