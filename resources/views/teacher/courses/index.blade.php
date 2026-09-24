@extends('teacher.layouts.app')

@section('title', __('messages.my_courses'))

@section('content')

<div class="teacher-courses-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="teacher-courses-header">

        <div class="teacher-courses-header-content">

            <div class="teacher-courses-header-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <div class="teacher-small-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.content_management') }}

                </div>

                <h2>
                    {{ __('messages.my_courses') }}
                </h2>

                <p>
                    {{ __('messages.manage_your_courses_description') }}
                </p>

            </div>

        </div>


        <a
            href="{{ route('teacher.courses.create') }}"
            class="teacher-create-course-btn">

            <i class="fas fa-plus"></i>

            <span>
                {{ __('messages.create_new_course') }}
            </span>

        </a>

    </div>



    {{-- =====================================================
         COURSES COUNT
    ====================================================== --}}

    <div class="teacher-courses-summary">

        <div class="teacher-summary-icon">

            <i class="fas fa-book-open"></i>

        </div>

        <div>

            <span>
                {{ __('messages.total_courses') }}
            </span>

            <strong>
                {{ $courses->count() }}
            </strong>

        </div>

        <div class="teacher-summary-text">

            <i class="fas fa-layer-group"></i>

            {{ __('messages.courses_created_by_you') }}

        </div>

    </div>



    {{-- =====================================================
         COURSES
    ====================================================== --}}

    @if($courses->count())

        <div class="teacher-courses-grid">

            @foreach($courses as $course)

                <div class="teacher-course-card">


                    {{-- IMAGE --}}

                    <div class="teacher-course-image">

                        @if($course->image)

                            <img
                                src="{{ asset('storage/' . $course->image) }}"
                                alt="{{ $course->title }}">

                        @else

                            <div class="teacher-course-placeholder">

                                <i class="fas fa-book-open"></i>

                            </div>

                        @endif


                        <div class="teacher-course-image-overlay"></div>


                        @if($course->category)

                            <div class="teacher-course-category">

                                <i class="fas {{ $course->category->icon ?? 'fa-book' }}"></i>

                                {{ $course->category->name }}

                            </div>

                        @endif

                    </div>



                    {{-- BODY --}}

                    <div class="teacher-course-body">


                        <h3>
                            {{ $course->title }}
                        </h3>


                        <p>

                            {{ Str::limit(
                                $course->description,
                                100
                            ) }}

                        </p>


                        {{-- COURSE INFO --}}

                        <div class="teacher-course-meta">

                            <span>

                                <i class="fas fa-book-open"></i>

                                {{ __('messages.educational_course') }}

                            </span>

                            <span>

                                <i class="fas fa-users"></i>

                                {{ $course->students->count() }}

                                {{ __('messages.student') }}

                            </span>

                        </div>


                    </div>



                    {{-- ACTIONS --}}

                    <div class="teacher-course-actions">


                        <a
                            href="{{ route(
                                'teacher.courses.show',
                                $course->id
                            ) }}"
                            class="teacher-course-action view"
                            title="{{ __('messages.view_course') }}">

                            <i class="fas fa-eye"></i>

                            <span>
                                {{ __('messages.view') }}
                            </span>

                        </a>


                        <a
                            href="{{ route(
                                'teacher.courses.edit',
                                $course->id
                            ) }}"
                            class="teacher-course-action edit"
                            title="{{ __('messages.edit_course') }}">

                            <i class="fas fa-pen"></i>

                            <span>
                                {{ __('messages.edit') }}
                            </span>

                        </a>


                        <form
                            action="{{ route(
                                'teacher.courses.destroy',
                                $course->id
                            ) }}"
                            method="POST"
                            class="teacher-course-delete-form">

                            @csrf

                            @method('DELETE')


                            <button
                                type="submit"
                                class="teacher-course-action delete"
                                title="{{ __('messages.delete_course') }}"
                                onclick="return confirm('{{ __('messages.confirm_delete_course') }}')">

                                <i class="fas fa-trash"></i>

                                <span>
                                    {{ __('messages.delete') }}
                                </span>

                            </button>

                        </form>


                    </div>

                </div>

            @endforeach

        </div>


    @else


        {{-- =================================================
             EMPTY STATE
        ================================================== --}}

        <div class="teacher-courses-empty">

            <div class="teacher-courses-empty-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <h3>
                {{ __('messages.no_courses_yet') }}
            </h3>

            <p>
                {{ __('messages.no_courses_created_description') }}
            </p>

            <a
                href="{{ route('teacher.courses.create') }}"
                class="teacher-empty-create-btn">

                <i class="fas fa-plus"></i>

                {{ __('messages.create_first_course') }}

            </a>

        </div>

    @endif


</div>


@endsection
