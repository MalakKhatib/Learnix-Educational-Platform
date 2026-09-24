@extends('student.layouts.app')

@section('title', $quiz->title)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | نظام المحاولتين
    |--------------------------------------------------------------------------
    */

    $maxAttempts = 2;

    $currentAttempts = $attemptsCount ?? 0;

    $remainingAttempts = max(
        0,
        $maxAttempts - $currentAttempts
    );

@endphp


<div class="student-quiz-page">


    {{-- =====================================================
         QUIZ HEADER
    ====================================================== --}}

    <div class="quiz-hero">

        <div class="quiz-hero-content">

            <div class="quiz-label">

                <i class="fas fa-clipboard-check"></i>

                {{ __('messages.educational_quiz') }}

            </div>


            <h1>

                {{ $quiz->title }}

            </h1>


            <p>

                {{ __('messages.quiz_instructions') }}

            </p>


            <div class="quiz-meta-row">


                {{-- عدد الأسئلة --}}

                <div class="quiz-meta">

                    <span class="quiz-meta-icon">

                        <i class="fas fa-list-check"></i>

                    </span>


                    <div>

                        <strong>

                            {{ $quiz->questions->count() }}

                        </strong>

                        <small>

                            {{ __('messages.question') }}

                        </small>

                    </div>

                </div>


                {{-- نوع الاختبار --}}

                <div class="quiz-meta">

                    <span class="quiz-meta-icon purple-meta">

                        <i class="fas fa-clock"></i>

                    </span>


                    <div>

                        <strong>

                            {{ __('messages.quiz_type') }}

                        </strong>

                        <small>

                            {{ __('messages.online_quiz') }}

                        </small>

                    </div>

                </div>


                {{-- المحاولات --}}

                <div class="quiz-meta">

                    <span class="quiz-meta-icon">

                        <i class="fas fa-repeat"></i>

                    </span>


                    <div>

                        <strong>

                            {{ $currentAttempts }}
                            /
                            {{ $maxAttempts }}

                        </strong>

                        <small>

                            {{ __('messages.attempts') }}

                        </small>

                    </div>

                </div>


            </div>

        </div>


        <div class="quiz-hero-icon">

            <i class="fas fa-award"></i>

        </div>

    </div>



    {{-- =====================================================
         ATTEMPTS INFORMATION
    ====================================================== --}}

    @if($remainingAttempts > 0)

        <div
            class="quiz-attempt-info"
            style="
                margin: 20px 0;
                padding: 18px 22px;
                border-radius: 16px;
                background: #f5f1ff;
                border: 1px solid #e8ddff;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                flex-wrap: wrap;
            "
        >

            <div
                style="
                    display: flex;
                    align-items: center;
                    gap: 14px;
                "
            >

                <div
                    style="
                        width: 44px;
                        height: 44px;
                        border-radius: 12px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background: #7c3aed;
                        color: white;
                        flex-shrink: 0;
                    "
                >

                    <i class="fas fa-repeat"></i>

                </div>


                <div>

                    <strong
                        style="
                            display: block;
                            color: #4c1d95;
                            margin-bottom: 4px;
                        "
                    >

                        {{ __('messages.attempt_number') }}

                        {{ $currentAttempts + 1 }}

                        {{ __('messages.of') }}

                        {{ $maxAttempts }}

                    </strong>


                    <span
                        style="
                            color: #6b7280;
                            font-size: 13px;
                        "
                    >

                        {{ __('messages.remaining_attempts') }}:

                        <strong>
                            {{ $remainingAttempts }}
                        </strong>

                    </span>

                </div>

            </div>


            <div
                style="
                    font-size: 13px;
                    font-weight: 700;
                    color: #6d28d9;
                    background: white;
                    padding: 9px 14px;
                    border-radius: 10px;
                    border: 1px solid #e8ddff;
                "
            >

                {{ __('messages.two_attempts_only') }}

            </div>

        </div>

    @endif



    {{-- =====================================================
         QUIZ FORM
    ====================================================== --}}

    @if($remainingAttempts > 0)

        <form
            method="POST"
            action="/quizzes/{{ $quiz->id }}/submit"
            id="quizForm"
        >

            @csrf


            {{-- =================================================
                 QUESTIONS
            ================================================== --}}

            @foreach(
                $quiz->questions
                as $index => $question
            )

                <div
                    class="quiz-question-card"
                    data-question="{{ $question->id }}"
                >

                    <div class="question-header">

                        <div class="question-number">

                            {{ $index + 1 }}

                        </div>


                        <div class="question-title">

                            <span>

                                {{ __('messages.question_number', [
                                    'number' => $index + 1
                                ]) }}

                            </span>


                            <h3>

                                {{ $question->question_text }}

                            </h3>

                        </div>

                    </div>


                    <div class="answers-list">

                        @foreach(
                            $question->answers
                            as $answer
                        )

                            <label
                                class="quiz-answer-option"
                            >

                                <input
                                    type="radio"
                                    name="answers[{{ $question->id }}]"
                                    value="{{ $answer->id }}"
                                    required
                                >


                                <span class="answer-radio">

                                    <span></span>

                                </span>


                                <span class="answer-text">

                                    {{ $answer->answer_text }}

                                </span>


                                <span class="answer-check">

                                    <i class="fas fa-check"></i>

                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach



            {{-- =================================================
                 SUBMIT
            ================================================== --}}

            <div class="quiz-submit-card">

                <div class="quiz-submit-info">

                    <div class="submit-icon">

                        <i class="fas fa-paper-plane"></i>

                    </div>


                    <div>

                        <h3>

                            {{ __('messages.answered_all_questions') }}

                        </h3>


                        <p>

                            {{ __('messages.review_answers') }}

                        </p>

                    </div>

                </div>


                <button
                    type="submit"
                    class="quiz-submit-btn"
                    id="submitQuizButton"
                >

                    <span>

                        {{ __('messages.submit_quiz') }}

                    </span>


                    <i class="fas fa-arrow-left"></i>

                </button>

            </div>

        </form>

    @else


        {{-- =================================================
             EXHAUSTED ATTEMPTS
        ================================================== --}}

        <div
            class="quiz-attempts-finished"
            style="
                margin-top: 25px;
                padding: 45px 30px;
                background: white;
                border: 1px solid #eee;
                border-radius: 22px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,.05);
            "
        >

            <div
                style="
                    width: 75px;
                    height: 75px;
                    margin: 0 auto 20px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: #f3e8ff;
                    color: #7c3aed;
                    font-size: 28px;
                "
            >

                <i class="fas fa-lock"></i>

            </div>


            <h2
                style="
                    margin-bottom: 10px;
                    color: #2d2140;
                "
            >

                {{ __('messages.attempts_finished') }}

            </h2>


            <p
                style="
                    margin: 0 auto 22px;
                    max-width: 550px;
                    color: #6b7280;
                    line-height: 1.8;
                "
            >

                {{ __('messages.no_attempts_remaining') }}

            </p>


            <div
                style="
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    padding: 10px 16px;
                    border-radius: 10px;
                    background: #f9f7ff;
                    color: #6d28d9;
                    font-weight: 700;
                    font-size: 13px;
                "
            >

                <i class="fas fa-repeat"></i>

                {{ $maxAttempts }}

                {{ __('messages.attempts') }}

            </div>

        </div>

    @endif

</div>



<script>

/* =====================================================
   ANSWER SELECTION
===================================================== */

document
    .querySelectorAll('.quiz-answer-option')
    .forEach(option => {

        option.addEventListener(
            'click',
            function () {

                const questionCard =
                    this.closest(
                        '.quiz-question-card'
                    );


                questionCard
                    .querySelectorAll(
                        '.quiz-answer-option'
                    )
                    .forEach(item => {

                        item.classList.remove(
                            'selected'
                        );

                    });


                this.classList.add(
                    'selected'
                );

            }
        );

    });



/* =====================================================
   SUBMIT PROTECTION
===================================================== */

const quizForm =
    document.getElementById('quizForm');


if (quizForm) {

    quizForm.addEventListener(
        'submit',
        function (event) {

            const totalQuestions =
                document.querySelectorAll(
                    '.quiz-question-card'
                ).length;


            const answeredQuestions =
                document.querySelectorAll(
                    '.quiz-answer-option input:checked'
                ).length;


            /*
            |--------------------------------------------------------------------------
            | التأكد من الإجابة على جميع الأسئلة
            |--------------------------------------------------------------------------
            */

            if (
                answeredQuestions <
                totalQuestions
            ) {

                event.preventDefault();

                alert(
                    @json(
                        __('messages.answer_all_questions')
                    )
                );

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | منع الضغط على زر التسليم أكثر من مرة
            |--------------------------------------------------------------------------
            */

            const submitButton =
                document.getElementById(
                    'submitQuizButton'
                );


            if (submitButton) {

                submitButton.disabled = true;

                submitButton.style.opacity = '0.7';

                submitButton.style.cursor = 'not-allowed';


                const buttonText =
                    submitButton.querySelector(
                        'span'
                    );


                if (buttonText) {

                    buttonText.textContent =
                        @json(
                            __('messages.submitting_quiz')
                        );

                }

            }

        }
    );

}

</script>

@endsection
