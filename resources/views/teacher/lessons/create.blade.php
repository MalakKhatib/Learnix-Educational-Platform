@extends('teacher.layouts.app')

@section('title', __('messages.create_lesson'))

@section('content')

<div class="teacher-create-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="create-page-header">

        <div class="create-header-content">

            <div class="create-header-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <div class="create-page-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.add_educational_content') }}

                </div>

                <h2>
                    {{ __('messages.create_new_lesson') }}
                </h2>

                <p>

                    {{ __('messages.add_lesson_to_course') }}

                    <strong>
                        {{ $course->title }}
                    </strong>

                </p>

            </div>

        </div>


        <div class="create-header-badge">

            <i class="fas fa-book"></i>

            {{ __('messages.new_lesson') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="create-course-card">

        <form
            method="POST"
            action="/teacher/courses/{{ $course->id }}/lessons"
            enctype="multipart/form-data">

            @csrf



            {{-- =================================================
                 LESSON INFORMATION
            ================================================== --}}

            <div class="form-section">


                <div class="form-section-title">

                    <div class="section-title-icon">

                        <i class="fas fa-circle-info"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.lesson_information') }}
                        </h4>

                        <p>
                            {{ __('messages.lesson_information_description') }}
                        </p>

                    </div>

                </div>



                {{-- TITLE --}}

                <div class="custom-form-group">

                    <label>

                        {{ __('messages.lesson_name') }}

                        <span>*</span>

                    </label>


                    <div class="custom-input-wrapper">

                        <i class="fas fa-heading"></i>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="{{ __('messages.lesson_name_placeholder') }}"
                            class="@error('title') input-error @enderror">

                    </div>


                    @error('title')

                        <div class="custom-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- CONTENT --}}

                <div class="custom-form-group">

                    <label>

                        {{ __('messages.lesson_content') }}

                        <span>*</span>

                    </label>


                    <div class="custom-textarea-wrapper">

                        <i class="fas fa-align-right"></i>

                        <textarea
                            name="content"
                            rows="9"
                            placeholder="{{ __('messages.lesson_content_placeholder') }}">{{ old('content') }}</textarea>

                    </div>


                    @error('content')

                        <div class="custom-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>



            {{-- =================================================
                 VIDEO
            ================================================== --}}

            <div class="form-section">


                <div class="form-section-title">

                    <div class="section-title-icon video-section-icon">

                        <i class="fas fa-video"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.lesson_video') }}
                        </h4>

                        <p>
                            {{ __('messages.lesson_video_description') }}
                        </p>

                    </div>

                </div>



                <div class="custom-form-group">

                    <label>

                        {{ __('messages.video_file') }}

                    </label>


                    <div class="custom-input-wrapper">

                        <i class="fas fa-file-video"></i>

                        <input
                            type="file"
                            name="video"
                            accept="video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska"
                            class="@error('video') input-error @enderror">

                    </div>


                    @error('video')

                        <div class="custom-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                <div class="lesson-video-hint">

                    <i class="fas fa-circle-info"></i>

                    {{ __('messages.video_upload_hint') }}

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
                    class="save-course-btn">

                    <i class="fas fa-save"></i>

                    {{ __('messages.save_lesson') }}

                </button>

            </div>


        </form>

    </div>

</div>

@endsection
