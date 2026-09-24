@extends('teacher.layouts.app')

@section('title', __('messages.edit_question'))

@section('content')

<div class="teacher-question-create-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="teacher-question-create-header">

        <div class="teacher-question-create-info">

            <div class="teacher-question-create-icon edit-question-icon">

                <i class="fas fa-pen"></i>

            </div>

            <div>

                <div class="teacher-question-create-label edit-question-label">

                    <i class="fas fa-clipboard-question"></i>

                    {{ __('messages.quiz_management') }}

                </div>

                <h2>
                    {{ __('messages.edit_question') }}
                </h2>

                <p>
                    {{ __('messages.edit_question_description') }}
                </p>

            </div>

        </div>


        <div class="teacher-question-create-badge edit-question-badge">

            <i class="fas fa-pen-to-square"></i>

            {{ __('messages.edit_question') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="teacher-question-create-card">

        <form
            method="POST"
            action="/teacher/questions/{{ $question->id }}">

            @csrf

            @method('PUT')



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
                            {{ __('messages.edit_question_text_description') }}
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
                            required>{{ old('question_text', $question->question_text) }}</textarea>

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
                            {{ __('messages.edit_answer_options_description') }}
                        </p>

                    </div>

                </div>


                <div class="question-options-grid">


                    @foreach($question->answers as $index => $answer)

                        <div class="question-option-group">

                            <label>

                                <span class="option-number">
                                    {{ $index + 1 }}
                                </span>

                                {{ __('messages.option') }} {{ $index + 1 }}

                                <span>*</span>

                            </label>


                            <div class="question-input-wrapper">

                                <i class="fas fa-circle-dot"></i>

                                <input
                                    type="text"
                                    name="option_{{ $index + 1 }}"
                                    value="{{ old(
                                        'option_'.($index + 1),
                                        $answer->answer_text
                                    ) }}"
                                    placeholder="{{ __('messages.write_option') }} {{ $index + 1 }}"
                                    required>

                            </div>

                        </div>

                    @endforeach


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
                            {{ __('messages.select_correct_answer_description') }}
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

                            @foreach($question->answers as $index => $answer)

                                <option
                                    value="{{ $index + 1 }}"
                                    {{ $answer->is_correct ? 'selected' : '' }}>

                                    {{ __('messages.option') }} {{ $index + 1 }}

                                </option>

                            @endforeach

                        </select>


                        <i class="fas fa-chevron-down question-select-arrow"></i>

                    </div>

                </div>


                <div class="question-correct-hint">

                    <i class="fas fa-circle-info"></i>

                    <span>
                        {{ __('messages.correct_answer_edit_hint') }}
                    </span>

                </div>

            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="question-form-actions">


                <a
                    href="{{ route(
                        'teacher.quizzes.show',
                        $question->quiz_id
                    ) }}"
                    class="question-cancel-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.cancel') }}

                </a>


                <button
                    type="submit"
                    class="question-save-btn edit-question-save-btn">

                    <i class="fas fa-save"></i>

                    {{ __('messages.save_changes') }}

                </button>

            </div>


        </form>

    </div>

</div>

@endsection
