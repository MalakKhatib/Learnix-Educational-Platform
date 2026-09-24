@extends('student.layouts.app')

@section('title', __('messages.my_courses'))

@section('content')

{{-- =====================================================
     PAGE HEADER
===================================================== --}}

<div class="courses-page-header">

    <div>

        <div class="courses-page-label">

            <i class="fas fa-graduation-cap"></i>

            {{ __('messages.learning_journey') }}

        </div>

        <h2>

            {{ __('messages.my_courses') }}

        </h2>

        <p>

            {{ __('messages.my_courses_description') }}

        </p>

    </div>


    <div class="courses-count-box">

        <div class="courses-count-icon">

            <i class="fas fa-book-open"></i>

        </div>

        <div>

            <strong>

                {{ $courses->count() }}

            </strong>

            <span>

                {{ __('messages.course_count') }}

            </span>

        </div>

    </div>

</div>



{{-- =====================================================
     COURSES
===================================================== --}}

<div class="my-courses-grid">

    @forelse($courses as $course)


        <div class="my-course-card">


            {{-- Course Image --}}

            <div class="my-course-image">


                @if($course->image)

                    <img
                        src="{{ asset('storage/' . $course->image) }}"
                        alt="{{ $course->title }}">

                @else

                    <div class="course-placeholder">

                        <i class="fas fa-book-open"></i>

                    </div>

                @endif


                {{-- Overlay --}}

                <div class="course-image-overlay"></div>


                {{-- Course Badge --}}

                <div class="course-badge">

                    <i class="fas fa-circle-check"></i>

                    {{ __('messages.enrolled') }}

                </div>


            </div>



            {{-- Course Body --}}

            <div class="my-course-body">


                {{-- Teacher --}}

                <div class="course-teacher">

                    <div class="teacher-mini-avatar">

                        {{ mb_substr(
                            $course->teacher->name,
                            0,
                            1
                        ) }}

                    </div>


                    <div>

                        <span>

                            {{ __('messages.teacher') }}

                        </span>

                        <strong>

                            {{ $course->teacher->name }}

                        </strong>

                    </div>

                </div>



                {{-- Title --}}

                <h3>

                    {{ $course->title }}

                </h3>



                {{-- Description --}}

                <p class="course-description">

                    {{ Str::limit(
                        $course->description,
                        105
                    ) }}

                </p>



                {{-- Course Info --}}

                <div class="course-info-row">


                    <div>

                        <i class="fas fa-book-open"></i>

                        <span>

                            {{ __('messages.educational_course') }}

                        </span>

                    </div>


                    <div>

                        <i class="fas fa-user-graduate"></i>

                        <span>

                            {{ __('messages.student') }}

                        </span>

                    </div>


                </div>



                {{-- Enter Course --}}

                <a
                    href="/courses/{{ $course->id }}"
                    class="course-enter-btn">

                    <span>

                        {{ __('messages.enter_course') }}

                    </span>


                    <span class="course-btn-icon">

                        <i class="fas fa-arrow-left"></i>

                    </span>

                </a>


            </div>

        </div>


    @empty


        {{-- Empty State --}}

        <div class="my-courses-empty">


            <div class="empty-course-icon">

                <i class="fas fa-book-open"></i>

            </div>


            <h3>

                {{ __('messages.no_registered_courses') }}

            </h3>


            <p>

                {{ __('messages.start_learning_now') }}

            </p>


            <a
                href="/courses"
                class="empty-course-btn">

                <i class="fas fa-compass"></i>

                {{ __('messages.explore_courses') }}

            </a>


        </div>


    @endforelse

</div>

@endsection
