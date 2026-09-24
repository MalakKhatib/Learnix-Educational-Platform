@extends('teacher.layouts.app')

@section('title', __('messages.add_question'))

@section('content')

<div class="teacher-question-create-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="teacher-question-create-header">

        <div class="teacher-question-create-info">

            <div class="teacher-question-create-icon">

                <i class="fas fa-circle-question"></i>

            </div>

            <div>

                <div class="teacher-question-create-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.quiz_management') }}

                </div>

                <h2>
                    {{ __('messages.add_new_question') }}
                </h2>

                <p>
                    {{ __('messages.add_question_to_quiz') }}
                </p>

            </div>

        </div>


        <div class="teacher-question-create-badge">

            <i class="fas fa-clipboard-question"></i>

            {{ __('messages.new_question') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="teacher-question-create-card">

        <form
            method="POST"
            action="/teacher/quizzes/{{ $quiz->id }}/questions">

            @csrf



            {{-- =================================================
                 QUESTION
            ================================================== --}}

            <div class="question-form-section">


                <div class="question-form-section-header">

                    <div class="question-section-icon purple">

                        <i class="fas fa-question"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.question_text') }}
                        </h4>

                        <p>
                            {{ __('messages.question_text_description') }}
                        </p>

                    </div>

                </div>



                <div class="question-custom-group">

                    <label>

                        {{ __('messages.question') }}

                        <span>*</span>

                    </label>


                    <div class="question-textarea-wrapper">

                        <i class="fas fa-align-right"></i>

                        <textarea
                            name="question_text"
                            rows="4"
                            placeholder="{{ __('messages.question_placeholder') }}"
                            required>{{ old('question_text') }}</textarea>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 ANSWERS
            ================================================== --}}

            <div class="question-form-section">


                <div class="question-form-section-header">

                    <div class="question-section-icon blue">

                        <i class="fas fa-list"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.answer_options') }}
                        </h4>

                        <p>
                            {{ __('messages.answer_options_description') }}
                        </p>

                    </div>

                </div>



                <div class="question-options-grid">


                    @for($i = 1; $i <= 4; $i++)

                        <div class="question-option-group">

                            <label>

                                <span class="option-number">
                                    {{ $i }}
                                </span>

                                {{ __('messages.option') }} {{ $i }}

                                <span>*</span>

                            </label>


                            <div class="question-input-wrapper">

                                <i class="fas fa-circle-dot"></i>

                                <input
                                    type="text"
                                    name="option_{{ $i }}"
                                    value="{{ old('option_'.$i) }}"
                                    placeholder="{{ __('messages.write_option') }} {{ $i }}"
                                    required>

                            </div>

                        </div>

                    @endfor


                </div>

            </div>



            {{-- =================================================
                 CORRECT ANSWER
            ================================================== --}}

            <div class="question-form-section">


                <div class="question-form-section-header">

                    <div class="question-section-icon green">

                        <i class="fas fa-circle-check"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.correct_answer') }}
                        </h4>

                        <p>
                            {{ __('messages.correct_answer_description') }}
                        </p>

                    </div>

                </div>



                <div class="question-custom-group">

                    <label>

                        {{ __('messages.correct_answer') }}

                        <span>*</span>

                    </label>


                    <div class="question-input-wrapper question-select-wrapper">

                        <i class="fas fa-check"></i>

                        <select
                            name="correct_answer"
                            required>

                            <option value="">
                                {{ __('messages.choose_correct_answer') }}
                            </option>

                            <option value="1"
                                {{ old('correct_answer') == '1' ? 'selected' : '' }}>
                                {{ __('messages.first_option') }}
                            </option>

                            <option value="2"
                                {{ old('correct_answer') == '2' ? 'selected' : '' }}>
                                {{ __('messages.second_option') }}
                            </option>

                            <option value="3"
                                {{ old('correct_answer') == '3' ? 'selected' : '' }}>
                                {{ __('messages.third_option') }}
                            </option>

                            <option value="4"
                                {{ old('correct_answer') == '4' ? 'selected' : '' }}>
                                {{ __('messages.fourth_option') }}
                            </option>

                        </select>

                        <i class="fas fa-chevron-down question-select-arrow"></i>

                    </div>

                </div>


                <div class="question-correct-hint">

                    <i class="fas fa-lightbulb"></i>

                    <span>
                        {{ __('messages.correct_answer_hint') }}
                    </span>

                </div>

            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="question-form-actions">


                <a
                    href="/teacher/quizzes/{{ $quiz->id }}"
                    class="question-cancel-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.back_to_quiz') }}

                </a>


                <button
                    type="submit"
                    class="question-save-btn">

                    <i class="fas fa-save"></i>

                    {{ __('messages.save_question') }}

                </button>

            </div>


        </form>

    </div>

</div>

@endsection
