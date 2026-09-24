@extends('teacher.layouts.app')

@section('title', __('messages.edit_course'))

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
                    {{ __('messages.edit_course') }}
                </h2>

                <p>
                    {{ __('messages.update_course_information') }}
                </p>

            </div>

        </div>


        <div class="create-header-badge">

            <i class="fas fa-book-open"></i>

            {{ __('messages.edit_content') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="create-course-card">

        <form
            method="POST"
            action="{{ route('teacher.courses.update', $course->id) }}"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')


            {{-- =================================================
                 BASIC INFORMATION
            ================================================== --}}

            <div class="form-section">


                <div class="form-section-title">

                    <div class="section-title-icon">

                        <i class="fas fa-circle-info"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.course_information') }}
                        </h4>

                        <p>
                            {{ __('messages.edit_course_information_description') }}
                        </p>

                    </div>

                </div>



                {{-- COURSE NAME --}}

                <div class="custom-form-group">

                    <label>

                        {{ __('messages.course_name') }}

                        <span>*</span>

                    </label>


                    <div class="custom-input-wrapper">

                        <i class="fas fa-heading"></i>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $course->title) }}"
                            placeholder="{{ __('messages.enter_course_name') }}"
                            class="@error('title') input-error @enderror">

                    </div>


                    @error('title')

                        <div class="custom-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- DESCRIPTION --}}

                <div class="custom-form-group">

                    <label>
                        {{ __('messages.course_description') }}
                    </label>


                    <div class="custom-textarea-wrapper">

                        <i class="fas fa-align-right"></i>

                        <textarea
                            name="description"
                            rows="6"
                            placeholder="{{ __('messages.enter_course_description') }}">{{ old('description', $course->description) }}</textarea>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 COURSE IMAGE
            ================================================== --}}

            <div class="form-section">


                <div class="form-section-title">

                    <div class="section-title-icon image-section-icon">

                        <i class="fas fa-image"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.course_image') }}
                        </h4>

                        <p>
                            {{ __('messages.course_image_edit_description') }}
                        </p>

                    </div>

                </div>



                <div class="course-image-upload">


                    {{-- UPLOAD --}}

                    <label
                        for="imageInput"
                        class="image-upload-box">

                        <div class="upload-icon">

                            <i class="fas fa-cloud-arrow-up"></i>

                        </div>


                        <strong>
                            {{ __('messages.choose_new_image') }}
                        </strong>


                        <span>
                            {{ __('messages.image_formats') }}
                        </span>


                        <small>
                            {{ __('messages.maximum_image_size') }}
                        </small>

                    </label>


                    <input
                        type="file"
                        id="imageInput"
                        name="image"
                        accept="image/png,image/jpeg,image/webp"
                        hidden>



                    {{-- PREVIEW --}}

                    <div class="image-preview-wrapper">

                        @if($course->image)

                            <img
                                id="previewImage"
                                src="{{ asset('storage/' . $course->image) }}"
                                alt="{{ __('messages.course_image') }}">

                        @else

                            <div
                                id="noImagePlaceholder"
                                class="teacher-edit-no-image">

                                <i class="fas fa-image"></i>

                                <span>
                                    {{ __('messages.no_current_image') }}
                                </span>

                            </div>

                            <img
                                id="previewImage"
                                alt="{{ __('messages.image_preview') }}">

                        @endif


                        <button
                            type="button"
                            id="removeImage"
                            class="remove-image-btn">

                            <i class="fas fa-xmark"></i>

                        </button>

                    </div>

                </div>


                @error('image')

                    <div class="custom-error mt-3">

                        <i class="fas fa-circle-exclamation"></i>

                        {{ $message }}

                    </div>

                @enderror

            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="create-form-actions">


                <a
                    href="{{ route('teacher.courses.show', $course->id) }}"
                    class="cancel-create-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.back_to_course') }}

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



{{-- =====================================================
     IMAGE PREVIEW
===================================================== --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const imageInput =
            document.getElementById('imageInput');

        const previewImage =
            document.getElementById('previewImage');

        const removeImage =
            document.getElementById('removeImage');

        const noImagePlaceholder =
            document.getElementById(
                'noImagePlaceholder'
            );


        if (
            !imageInput ||
            !previewImage ||
            !removeImage
        ) {
            return;
        }


        imageInput.addEventListener(
            'change',
            function (event) {

                const file =
                    event.target.files[0];


                if (!file) {
                    return;
                }


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        previewImage.src =
                            event.target.result;

                        previewImage.style.display =
                            'block';

                        removeImage.style.display =
                            'flex';


                        if (noImagePlaceholder) {

                            noImagePlaceholder.style.display =
                                'none';

                        }

                    };


                reader.readAsDataURL(file);

            }
        );


        removeImage.addEventListener(
            'click',
            function () {

                imageInput.value = '';


                @if($course->image)

                    previewImage.src =
                        "{{ asset('storage/' . $course->image) }}";

                    previewImage.style.display =
                        'block';

                    removeImage.style.display =
                        'none';

                @else

                    previewImage.src = '';

                    previewImage.style.display =
                        'none';

                    removeImage.style.display =
                        'none';


                    if (noImagePlaceholder) {

                        noImagePlaceholder.style.display =
                            'flex';

                    }

                @endif

            }
        );

    }
);

</script>

@endsection
