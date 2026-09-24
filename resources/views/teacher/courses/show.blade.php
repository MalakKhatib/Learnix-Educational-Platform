@extends('teacher.layouts.app')

@section('title', $course->title)

@section('content')

<div class="teacher-course-show-page">

    {{-- =====================================================
         COURSE HEADER
    ====================================================== --}}

    <div class="teacher-course-show-header">

        <div class="teacher-course-show-info">

            <div class="teacher-course-show-icon">

                @if($course->image)

                    <img
                        src="{{ asset('storage/' . $course->image) }}"
                        alt="{{ $course->title }}">

                @else

                    <i class="fas fa-book-open"></i>

                @endif

            </div>


            <div>

                <div class="teacher-course-show-label">

                    <i class="fas fa-graduation-cap"></i>

                    {{ __('messages.course_management') }}

                </div>


                <h2>
                    {{ $course->title }}
                </h2>


                <p>

                    {{ $course->description ?: __('messages.no_course_description') }}

                </p>

            </div>

        </div>


        <a
            href="{{ route('teacher.courses.index') }}"
            class="teacher-back-course-btn">

            <i class="fas fa-arrow-right"></i>

            {{ __('messages.my_courses') }}

        </a>

    </div>



    {{-- =====================================================
         COURSE STATISTICS
    ====================================================== --}}

    <div class="teacher-course-show-stats">


        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon purple">

                <i class="fas fa-book"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.lessons') }}
                </span>

                <strong>
                    {{ $course->lessons->count() }}
                </strong>

            </div>

        </div>



        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon orange">

                <i class="fas fa-clipboard-question"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.quizzes') }}
                </span>

                <strong>
                    {{ $course->quizzes->count() }}
                </strong>

            </div>

        </div>



        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon blue">

                <i class="fas fa-users"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.students') }}
                </span>

                <strong>
                    {{ $course->students->count() }}
                </strong>

            </div>

        </div>


    </div>



    {{-- =====================================================
         LESSONS
    ====================================================== --}}

    <div class="teacher-content-section">


        <div class="teacher-content-section-header">

            <div>

                <div class="teacher-section-label">

                    <i class="fas fa-book-open"></i>

                    {{ __('messages.educational_content') }}

                </div>

                <h3>
                    {{ __('messages.lessons') }}
                </h3>

                <p>
                    {{ __('messages.manage_course_lessons') }}
                </p>

            </div>


            <div class="teacher-section-header-actions">


                {{-- تقرير الحضور --}}
                <a
                    href="{{ route('teacher.course.attendance', $course->id) }}"
                    class="teacher-section-add-btn purple">

                    <i class="fas fa-user-check"></i>

                    {{ __('messages.attendance_report') }}

                </a>


                {{-- إضافة درس --}}
                <a
                    href="/teacher/courses/{{ $course->id }}/lessons/create"
                    class="teacher-section-add-btn green">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.add_lesson') }}

                </a>

            </div>

        </div>


        @if($course->lessons->count())


            <div class="teacher-items-list">

                @foreach($course->lessons as $index => $lesson)

                    <div class="teacher-content-item">


                        <div class="teacher-item-number">

                            {{ $index + 1 }}

                        </div>


                        <div class="teacher-item-icon lesson">

                            <i class="fas fa-book-open"></i>

                        </div>


                        <div class="teacher-item-info">

                            <h4>

                                {{ $lesson->title }}

                            </h4>

                            <p>

                                {{ Str::limit(
                                    $lesson->content,
                                    100
                                ) }}

                            </p>

                        </div>


                        <div class="teacher-item-actions">


                            <a
                                href="/teacher/lessons/{{ $lesson->id }}"
                                class="teacher-item-btn view">

                                <i class="fas fa-eye"></i>

                                <span>
                                    {{ __('messages.view') }}
                                </span>

                            </a>



                            <a
                                href="/teacher/lessons/{{ $lesson->id }}/edit"
                                class="teacher-item-btn edit">

                                <i class="fas fa-pen"></i>

                                <span>
                                    {{ __('messages.edit') }}
                                </span>

                            </a>



                            <form
                                action="/teacher/lessons/{{ $lesson->id }}"
                                method="POST">

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="teacher-item-btn delete"
                                    onclick="return confirm('{{ __('messages.confirm_delete_lesson') }}')">

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


            <div class="teacher-section-empty">

                <div class="teacher-section-empty-icon green">

                    <i class="fas fa-book-open"></i>

                </div>

                <h4>
                    {{ __('messages.no_lessons_added') }}
                </h4>

                <p>
                    {{ __('messages.start_adding_first_lesson') }}
                </p>

                <a
                    href="/teacher/courses/{{ $course->id }}/lessons/create"
                    class="teacher-empty-action green">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.add_first_lesson') }}

                </a>

            </div>

        @endif

    </div>



    {{-- =====================================================
         QUIZZES
    ====================================================== --}}

    <div class="teacher-content-section quizzes-section">


        <div class="teacher-content-section-header">

            <div>

                <div class="teacher-section-label orange-label">

                    <i class="fas fa-clipboard-question"></i>

                    {{ __('messages.assessment') }}

                </div>

                <h3>
                    {{ __('messages.quizzes') }}
                </h3>

                <p>
                    {{ __('messages.create_manage_quizzes') }}
                </p>

            </div>


            <a
                href="/teacher/courses/{{ $course->id }}/quizzes/create"
                class="teacher-section-add-btn orange">

                <i class="fas fa-plus"></i>

                {{ __('messages.add_quiz') }}

            </a>

        </div>



        @if($course->quizzes->count())


            <div class="teacher-items-list">

                @foreach($course->quizzes as $index => $quiz)

                    <div class="teacher-content-item">


                        <div class="teacher-item-number orange-number">

                            {{ $index + 1 }}

                        </div>


                        <div class="teacher-item-icon quiz">

                            <i class="fas fa-clipboard-question"></i>

                        </div>


                        <div class="teacher-item-info">

                            <h4>

                                {{ $quiz->title }}

                            </h4>

                            <p>

                                <i class="fas fa-circle-question"></i>

                                {{ __('messages.question_count_label') }}

                                {{ $quiz->questions->count() }}

                            </p>

                        </div>


                        <div class="teacher-item-actions">


                            <a
                                href="/teacher/quizzes/{{ $quiz->id }}"
                                class="teacher-item-btn view">

                                <i class="fas fa-eye"></i>

                                <span>
                                    {{ __('messages.view') }}
                                </span>

                            </a>



                            <a
                                href="/teacher/quizzes/{{ $quiz->id }}/edit"
                                class="teacher-item-btn edit">

                                <i class="fas fa-pen"></i>

                                <span>
                                    {{ __('messages.edit') }}
                                </span>

                            </a>



                            <form
                                action="/teacher/quizzes/{{ $quiz->id }}"
                                method="POST">

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="teacher-item-btn delete"
                                    onclick="return confirm('{{ __('messages.confirm_delete_quiz') }}')">

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


            <div class="teacher-section-empty">

                <div class="teacher-section-empty-icon orange">

                    <i class="fas fa-clipboard-question"></i>

                </div>

                <h4>
                    {{ __('messages.no_quizzes_added') }}
                </h4>

                <p>
                    {{ __('messages.add_first_quiz_description') }}
                </p>

                <a
                    href="/teacher/courses/{{ $course->id }}/quizzes/create"
                    class="teacher-empty-action orange">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.add_first_quiz') }}

                </a>

            </div>

        @endif

    </div>


</div>

@endsection
