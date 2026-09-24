@extends('teacher.layouts.app')

@section('title', __('messages.create_quiz'))

@section('content')

<div class="teacher-create-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="create-page-header">

        <div class="create-header-content">

            <div class="create-header-icon quiz-create-icon">

                <i class="fas fa-clipboard-question"></i>

            </div>

            <div>

                <div class="create-page-label quiz-create-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.student_assessment') }}

                </div>

                <h2>
                    {{ __('messages.create_new_quiz') }}
                </h2>

                <p>

                    {{ __('messages.create_quiz_for_course') }}

                    <strong>
                        {{ $course->title }}
                    </strong>

                </p>

            </div>

        </div>


        <div class="create-header-badge quiz-create-badge">

            <i class="fas fa-clipboard-check"></i>

            {{ __('messages.new_quiz') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="create-course-card">


        <form
            method="POST"
            action="/teacher/courses/{{ $course->id }}/quizzes">

            @csrf



            {{-- =================================================
                 QUIZ INFORMATION
            ================================================== --}}

            <div class="form-section">


                <div class="form-section-title">

                    <div class="section-title-icon quiz-section-icon">

                        <i class="fas fa-circle-info"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.quiz_information') }}
                        </h4>

                        <p>
                            {{ __('messages.quiz_information_description') }}
                        </p>

                    </div>

                </div>



                {{-- TITLE --}}

                <div class="custom-form-group">

                    <label>

                        {{ __('messages.quiz_title') }}

                        <span>*</span>

                    </label>


                    <div class="custom-input-wrapper quiz-input-wrapper">

                        <i class="fas fa-heading"></i>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="{{ __('messages.quiz_title_placeholder') }}"
                            class="@error('title') input-error @enderror"
                            required>

                    </div>


                    @error('title')

                        <div class="custom-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- COURSE --}}

                <div class="quiz-course-info">

                    <div class="quiz-course-info-icon">

                        <i class="fas fa-book-open"></i>

                    </div>

                    <div>

                        <span>
                            {{ __('messages.related_course') }}
                        </span>

                        <strong>
                            {{ $course->title }}
                        </strong>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 INFORMATION NOTE
            ================================================== --}}

            <div class="quiz-create-note">

                <div class="quiz-note-icon">

                    <i class="fas fa-lightbulb"></i>

                </div>

                <div>

                    <strong>
                        {{ __('messages.note') }}
                    </strong>

                    <p>
                        {{ __('messages.quiz_after_creation_note') }}
                    </p>

                </div>

            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="create-form-actions">


                <a
                    href="{{ route(
                        'teacher.courses.show',
                        $course->id
                    ) }}"
                    class="cancel-create-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.back_to_course') }}

                </a>


                <button
                    type="submit"
                    class="save-course-btn quiz-save-btn">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.create_quiz') }}

                </button>

            </div>


        </form>

    </div>

</div>

@endsection
