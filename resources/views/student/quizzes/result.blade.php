@extends('student.layouts.app')

@section('title', __('messages.quiz_result'))

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | حساب النسبة المئوية
    |--------------------------------------------------------------------------
    */

    $percentage = $totalQuestions > 0
        ? round(($score / $totalQuestions) * 100)
        : 0;


    /*
    |--------------------------------------------------------------------------
    | تحديد الرسالة حسب النتيجة
    |--------------------------------------------------------------------------
    */

    if ($percentage == 100) {

        $resultMessage = 'نتيجة رائعة! أتممت الاختبار بإتقان';
        $resultDescription = 'أداء مميز، أجبت عن جميع الأسئلة بشكل صحيح.';
        $resultClass = 'excellent';
        $resultIcon = 'fa-trophy';
        $heroMessage = 'أداء رائع!';

    } elseif ($percentage >= 80) {

        $resultMessage = 'ممتاز! أداء مميز جدًا';
        $resultDescription = 'نتيجة رائعة، استمر بهذا المستوى المميز.';
        $resultClass = 'excellent';
        $resultIcon = 'fa-star';
        $heroMessage = 'أداء ممتاز! ';

    } elseif ($percentage >= 60) {

        $resultMessage = 'أحسنت! نتيجة جيدة ';
        $resultDescription = 'أداء جيد، واصل تقدمك وحاول الوصول إلى نتيجة أعلى.';
        $resultClass = 'good';
        $resultIcon = 'fa-circle-check';
        $heroMessage = 'أحسنت! ';

    } elseif ($percentage >= 40) {

        $resultMessage = 'بداية جيدة! ';
        $resultDescription = 'لديك أساس جيد، حاول مراجعة أخطائك وتحسين نتيجتك.';
        $resultClass = 'average';
        $resultIcon = 'fa-chart-line';
        $heroMessage = 'بداية جيدة! ';

    } elseif ($percentage > 0) {

        $resultMessage = 'لا بأس، استمر بالمحاولة ';
        $resultDescription = 'كل محاولة تساعدك على التعلم وتحقيق نتيجة أفضل.';
        $resultClass = 'weak';
        $resultIcon = 'fa-seedling';
        $heroMessage = 'استمر بالمحاولة ';

    } else {

        $resultMessage = 'لا تيأس! هذه مجرد بداية ';
        $resultDescription = 'راجع الأسئلة وحاول مرة أخرى، وستكون نتيجتك القادمة أفضل.';
        $resultClass = 'weak';
        $resultIcon = 'fa-heart';
        $heroMessage = 'لا تيأس، حاول مرة أخرى ';

    }

@endphp


<div class="student-quiz-result-page">

    {{-- =====================================================
         RESULT HERO
    ====================================================== --}}

    <div class="quiz-result-hero">

        <div class="quiz-result-icon">

            <i class="fas fa-award"></i>

        </div>

        <div>

            <div class="quiz-result-label">

                <i class="fas fa-circle-check"></i>

                {{ __('messages.quiz_submitted_successfully') }}

            </div>

            <h2>
                {{ $heroMessage }}
            </h2>

            <p>
                {{ __('messages.completed_quiz') }}
                <strong>{{ $quiz->title }}</strong>
            </p>

        </div>

    </div>


    {{-- =====================================================
         SCORE
    ====================================================== --}}

    <div class="quiz-result-score-card">

        <div
            class="quiz-result-score-circle"
            style="
                background:
                conic-gradient(
                    #8B5CF6 {{ $percentage }}%,
                    #EEE7FA {{ $percentage }}%
                );
            "
        >

            <div>

                <strong>
                    {{ $percentage }}%
                </strong>

                <span>
                    {{ __('messages.your_score') }}
                </span>

            </div>

        </div>


        <div class="quiz-result-score-info">

            <div class="quiz-result-small-label">
                {{ __('messages.final_result') }}
            </div>

            <h3>
                {{ $score }}

                <span>
                    / {{ $totalQuestions }}
                </span>
            </h3>

            <p>
                {{ __('messages.correct_answers_from_total') }}
            </p>

        </div>

    </div>


    {{-- =====================================================
         RESULT MESSAGE
    ====================================================== --}}

    <div class="quiz-result-message">

        <div class="result-message-icon {{ $resultClass }}">

            <i class="fas {{ $resultIcon }}"></i>

        </div>

        <div>

            <h3>
                {{ $resultMessage }}
            </h3>

            <p>
                {{ $resultDescription }}
            </p>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="quiz-result-summary-grid">


        <div class="quiz-result-summary-item">

            <div class="quiz-result-summary-icon purple">

                <i class="fas fa-list-check"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.total_questions') }}
                </span>

                <strong>
                    {{ $totalQuestions }}
                </strong>

            </div>

        </div>


        <div class="quiz-result-summary-item">

            <div class="quiz-result-summary-icon green">

                <i class="fas fa-circle-check"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.correct_answers') }}
                </span>

                <strong>
                    {{ $score }}
                </strong>

            </div>

        </div>


        <div class="quiz-result-summary-item">

            <div class="quiz-result-summary-icon orange">

                <i class="fas fa-xmark"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.wrong_answers') }}
                </span>

                <strong>
                    {{ max(0, $totalQuestions - $score) }}
                </strong>

            </div>

        </div>


    </div>


    {{-- =====================================================
         ACTIONS
    ====================================================== --}}

    <div class="quiz-result-actions">

        <a
            href="/courses/{{ $quiz->course_id }}"
            class="quiz-result-course-btn">

            <i class="fas fa-arrow-right"></i>

            {{ __('messages.back_to_course') }}

        </a>


        <a
            href="/quizzes/{{ $quiz->id }}/attempts"
            class="quiz-result-attempts-btn">

            <i class="fas fa-clock-rotate-left"></i>

            {{ __('messages.view_my_attempts') }}

        </a>

    </div>


</div>


@endsection
