@extends('teacher.layouts.app')

@section('title', $quiz->title)

@section('content')

<div class="teacher-quiz-show-page">


    {{-- =====================================================
         QUIZ HEADER
    ====================================================== --}}

    <div class="teacher-quiz-header">

        <div class="teacher-quiz-header-info">

            <div class="teacher-quiz-header-icon">

                <i class="fas fa-clipboard-question"></i>

            </div>

            <div>

                <div class="teacher-quiz-label">

                    <i class="fas fa-graduation-cap"></i>

                    {{ __('messages.quiz_management') }}

                </div>

                <h2>
                    {{ $quiz->title }}
                </h2>

                <p>
                    {{ __('messages.manage_quiz_questions_answers') }}
                </p>

            </div>

        </div>


        <div class="teacher-quiz-header-actions">

            <a
                href="{{ route('teacher.courses.show', $quiz->course_id) }}"
                class="quiz-back-btn">

                <i class="fas fa-arrow-right"></i>

                {{ __('messages.back_to_course') }}

            </a>


            <a
                href="/teacher/quizzes/{{ $quiz->id }}/questions/create"
                class="quiz-add-question-btn">

                <i class="fas fa-plus"></i>

                {{ __('messages.add_question') }}

            </a>

        </div>

    </div>



    {{-- =====================================================
         QUIZ STATISTICS
    ====================================================== --}}

    <div class="teacher-quiz-stats">


        <div class="teacher-quiz-stat">

            <div class="teacher-quiz-stat-icon purple">

                <i class="fas fa-circle-question"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.question_count') }}
                </span>

                <strong>
                    {{ $quiz->questions->count() }}
                </strong>

            </div>

        </div>



        <div class="teacher-quiz-stat">

            <div class="teacher-quiz-stat-icon green">

                <i class="fas fa-circle-check"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.answers') }}
                </span>

                <strong>

                    {{ $quiz->questions->sum(
                        fn($question) =>
                        $question->answers->count()
                    ) }}

                </strong>

            </div>

        </div>


    </div>



    {{-- =====================================================
         QUESTIONS
    ====================================================== --}}

    <div class="teacher-quiz-questions-card">


        <div class="teacher-quiz-section-header">

            <div>

                <div class="teacher-section-label quiz-label">

                    <i class="fas fa-list-check"></i>

                    {{ __('messages.quiz_content') }}

                </div>

                <h3>
                    {{ __('messages.quiz_questions') }}
                </h3>

                <p>
                    {{ __('messages.manage_quiz_questions_description') }}
                </p>

            </div>


            <a
                href="/teacher/quizzes/{{ $quiz->id }}/questions/create"
                class="quiz-small-add-btn">

                <i class="fas fa-plus"></i>

                {{ __('messages.new_question') }}

            </a>

        </div>



        @forelse($quiz->questions as $index => $question)


            <div class="teacher-question-card">


                {{-- QUESTION TOP --}}

                <div class="teacher-question-top">


                    <div class="teacher-question-number">

                        {{ __('messages.question') }}

                        {{ $index + 1 }}

                    </div>


                    <div class="teacher-question-actions">


                        <a
                            href="/teacher/questions/{{ $question->id }}/edit"
                            class="teacher-question-action edit">

                            <i class="fas fa-pen"></i>

                            {{ __('messages.edit') }}

                        </a>


                        <form
                            action="/teacher/questions/{{ $question->id }}"
                            method="POST">

                            @csrf

                            @method('DELETE')


                            <button
                                type="submit"
                                class="teacher-question-action delete"
                                onclick="return confirm('{{ __('messages.confirm_delete_question') }}')">

                                <i class="fas fa-trash"></i>

                                {{ __('messages.delete') }}

                            </button>

                        </form>

                    </div>

                </div>



                {{-- QUESTION TEXT --}}

                <div class="teacher-question-text">

                    <i class="fas fa-question"></i>

                    <h4>
                        {{ $question->question_text }}
                    </h4>

                </div>



                {{-- ANSWERS --}}

                <div class="teacher-answers-title">

                    <i class="fas fa-list"></i>

                    {{ __('messages.answers') }}

                </div>


                <div class="teacher-answers-list">

                    @forelse($question->answers as $answer)

                        <div
                            class="teacher-answer-item
                            {{ $answer->is_correct ? 'correct' : '' }}">


                            <div class="teacher-answer-icon">

                                @if($answer->is_correct)

                                    <i class="fas fa-check"></i>

                                @else

                                    <i class="fas fa-circle"></i>

                                @endif

                            </div>


                            <span>

                                {{ $answer->answer_text }}

                            </span>


                            @if($answer->is_correct)

                                <span class="teacher-correct-badge">

                                    <i class="fas fa-check"></i>

                                    {{ __('messages.correct_answer') }}

                                </span>

                            @endif


                        </div>

                    @empty

                        <div class="teacher-no-answers">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ __('messages.no_answers_for_question') }}

                        </div>

                    @endforelse

                </div>


            </div>


        @empty


            <div class="teacher-quiz-empty">

                <div class="teacher-quiz-empty-icon">

                    <i class="fas fa-circle-question"></i>

                </div>

                <h4>
                    {{ __('messages.no_questions_yet') }}
                </h4>

                <p>
                    {{ __('messages.start_adding_first_question') }}
                </p>

                <a
                    href="/teacher/quizzes/{{ $quiz->id }}/questions/create"
                    class="quiz-empty-add-btn">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.add_first_question') }}

                </a>

            </div>

        @endforelse


    </div>


</div>

@endsection
