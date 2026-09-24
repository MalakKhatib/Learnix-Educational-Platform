@extends('teacher.layouts.app')

@section('title', __('messages.edit_lesson'))

@section('content')

<div class="teacher-create-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="create-page-header">

        <div class="create-header-content">

            <div class="create-header-icon">

                <i class="fas fa-pen-to-square"></i>

            </div>

            <div>

                <div class="create-page-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.manage_educational_content') }}

                </div>

                <h2>
                    {{ __('messages.edit_lesson') }}
                </h2>

                <p>

                    {{ __('messages.edit_lesson_content') }}

                    <strong>
                        {{ $lesson->title }}
                    </strong>

                </p>

            </div>

        </div>


        <div class="create-header-badge">

            <i class="fas fa-book-open"></i>

            {{ __('messages.edit_lesson') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="create-course-card">

        <form
            action="{{ route('teacher.lessons.update', $lesson->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')



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
                            {{ __('messages.update_lesson_information') }}
                        </p>

                    </div>

                </div>



                {{-- TITLE --}}

                <div class="custom-form-group">

                    <label>

                        {{ __('messages.lesson_title') }}

                        <span>*</span>

                    </label>


                    <div class="custom-input-wrapper">

                        <i class="fas fa-heading"></i>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $lesson->title) }}"
                            placeholder="{{ __('messages.lesson_name_placeholder') }}"
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
                            placeholder="{{ __('messages.lesson_content_placeholder') }}">{{ old('content', $lesson->content) }}</textarea>

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
                            {{ __('messages.replace_lesson_video_description') }}
                        </p>

                    </div>

                </div>



                {{-- CURRENT VIDEO --}}

                @if($lesson->video_path)

                    <div class="lesson-video-hint">

                        <i class="fas fa-circle-check"></i>

                        {{ __('messages.current_video_exists') }}

                    </div>

                @endif



                {{-- NEW VIDEO --}}

                <div class="custom-form-group">

                    <label>
                        {{ __('messages.new_video') }}
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

                    {{ __('messages.video_replace_hint') }}

                </div>

            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="create-form-actions">


                <a
                    href="{{ route('teacher.lessons.show', $lesson->id) }}"
                    class="cancel-create-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.cancel') }}

                </a>


                <button
                    type="submit"
                    class="save-course-btn">

                    <i class="fas fa-save"></i>

                    {{ __('messages.save_changes') }}

                </button>

            </div>


        </form>

    </div>

</div>

@endsection
