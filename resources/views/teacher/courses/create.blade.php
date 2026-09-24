@extends('teacher.layouts.app')

@section('title', __('messages.create_course'))

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
                    {{ __('messages.create_new_course') }}
                </h2>

                <p>
                    {{ __('messages.create_course_description') }}
                </p>

            </div>

        </div>


        <div class="create-header-badge">

            <i class="fas fa-graduation-cap"></i>

            {{ __('messages.new_course') }}

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="create-course-card">

        <form
            method="POST"
            action="{{ route('teacher.courses.store') }}"
            enctype="multipart/form-data">

            @csrf


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
                            {{ __('messages.course_information_description') }}
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
                            value="{{ old('title') }}"
                            placeholder="{{ __('messages.course_name_placeholder') }}"
                            class="@error('title') input-error @enderror">

                    </div>


                    @error('title')

                        <div class="custom-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- CATEGORY --}}

                <div class="custom-form-group">

                    <label>

                        {{ __('messages.course_category') }}

                        <span>*</span>

                    </label>


                    <div class="custom-input-wrapper select-wrapper">

                        <i class="fas fa-layer-group"></i>


                        <select
                            name="category_id"
                            class="@error('category_id') input-error @enderror">

                            <option value="">
                                {{ __('messages.select_course_category') }}
                            </option>


                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>


                        <i class="fas fa-chevron-down select-arrow"></i>

                    </div>


                    @error('category_id')

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
                            placeholder="{{ __('messages.course_description_placeholder') }}">{{ old('description') }}</textarea>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 IMAGE
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
                            {{ __('messages.course_image_description') }}
                        </p>

                    </div>

                </div>



                <div class="course-image-upload">


                    <label
                        for="imageInput"
                        class="image-upload-box">

                        <div class="upload-icon">

                            <i class="fas fa-cloud-arrow-up"></i>

                        </div>


                        <strong>
                            {{ __('messages.choose_course_image') }}
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



                    <div class="image-preview-wrapper">

                        <img
                            id="previewImage"
                            alt="{{ __('messages.course_image_preview') }}">


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
                    href="{{ route('teacher.courses.index') }}"
                    class="cancel-create-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.back_to_courses') }}

                </a>



                <button
                    type="submit"
                    class="save-course-btn">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.create_course') }}

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

                    };


                reader.readAsDataURL(file);

            }
        );


        removeImage.addEventListener(
            'click',
            function () {

                imageInput.value = '';

                previewImage.src = '';

                previewImage.style.display =
                    'none';

                removeImage.style.display =
                    'none';

            }
        );

    }
);

</script>

@endsection
