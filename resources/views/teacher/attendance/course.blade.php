@extends('teacher.layouts.app')

@section('title', __('messages.course_attendance_report'))

@section('content')

<div class="teacher-lesson-show-page">

    {{-- HEADER --}}
    <div class="teacher-lesson-header">

        <div class="teacher-lesson-header-info">

            <div class="teacher-lesson-header-icon">
                <i class="fas fa-chart-column"></i>
            </div>

            <div>

                <div class="teacher-section-label">

                    <i class="fas fa-clipboard-check"></i>

                    {{ __('messages.course_attendance_report') }}

                </div>

                <h2>
                    {{ $course->title }}
                </h2>

                <p>
                    {{ __('messages.attendance_followup') }}
                </p>

            </div>

        </div>

    </div>


    {{-- ================================
         ATTENDANCE STATISTICS
    ================================= --}}

    <div class="teacher-course-show-stats">

        {{-- عدد الطلاب --}}
        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon blue">

                <i class="fas fa-users"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.students') }}
                </span>

                <strong>
                    {{ $studentsCount }}
                </strong>

            </div>

        </div>


        {{-- عدد الدروس --}}
        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon purple">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.lessons') }}
                </span>

                <strong>
                    {{ $lessonsCount }}
                </strong>

            </div>

        </div>


        {{-- عدد الحضور --}}
        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon green">

                <i class="fas fa-user-check"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.attendance_cases') }}
                </span>

                <strong>
                    {{ $presentCount }}
                </strong>

            </div>

        </div>


        {{-- نسبة الحضور --}}
        <div class="teacher-show-stat">

            <div class="teacher-show-stat-icon orange">

                <i class="fas fa-chart-pie"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.average_attendance') }}
                </span>

                <strong>
                    {{ $attendancePercentage }}%
                </strong>

            </div>

        </div>

    </div>


    {{-- ================================
         ATTENDANCE FILTER
    ================================= --}}

    <div class="teacher-lesson-card attendance-filter-card">

        <div class="teacher-lesson-section-header">

            <div class="teacher-lesson-section-icon blue">

                <i class="fas fa-filter"></i>

            </div>

            <div>

                <h3>
                    {{ __('messages.attendance_filter') }}
                </h3>

                <p>
                    {{ __('messages.attendance_filter_description') }}
                </p>

            </div>

        </div>


        <form
            method="GET"
            action="{{ route('teacher.course.attendance', $course->id) }}"
            class="attendance-filter-form">


            {{-- الطالب --}}
            <div class="attendance-filter-group">

                <label for="student_id">

                    <i class="fas fa-user"></i>

                    {{ __('messages.student') }}

                </label>


                <select
                    name="student_id"
                    id="student_id"
                    class="attendance-filter-select">

                    <option value="">
                        {{ __('messages.all_students') }}
                    </option>

                    @foreach($students as $student)

                        <option
                            value="{{ $student->id }}"
                            {{ $selectedStudent == $student->id ? 'selected' : '' }}>

                            {{ $student->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- الدرس --}}
            <div class="attendance-filter-group">

                <label for="lesson_id">

                    <i class="fas fa-book-open"></i>

                    {{ __('messages.lesson') }}

                </label>


                <select
                    name="lesson_id"
                    id="lesson_id"
                    class="attendance-filter-select">

                    <option value="">
                        {{ __('messages.all_lessons') }}
                    </option>

                    @foreach($course->lessons as $lesson)

                        <option
                            value="{{ $lesson->id }}"
                            {{ $selectedLesson == $lesson->id ? 'selected' : '' }}>

                            {{ $lesson->title }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- زر البحث --}}
            <button
                type="submit"
                class="attendance-filter-btn">

                <i class="fas fa-search"></i>

                {{ __('messages.show_report') }}

            </button>


            {{-- إلغاء الفلتر --}}
            @if($selectedStudent || $selectedLesson)

                <a
                    href="{{ route('teacher.course.attendance', $course->id) }}"
                    class="attendance-reset-btn">

                    <i class="fas fa-rotate-left"></i>

                    {{ __('messages.reset_filter') }}

                </a>

            @endif

        </form>

    </div>


    {{-- ================================
         ATTENDANCE TABLE
    ================================= --}}

    <div class="teacher-lesson-card">

        <div class="teacher-lesson-section-header">

            <div class="teacher-lesson-section-icon purple">

                <i class="fas fa-users"></i>

            </div>

            <div>

                <h3>
                    {{ __('messages.attendance_record') }}
                </h3>

                <p>
                    {{ __('messages.attendance_record_description') }}
                </p>

            </div>

        </div>


        @if($students->count() > 0 && $course->lessons->count() > 0)

            <div class="table-responsive">

                <table class="table">

                    <thead>

                        <tr>

                            <th>
                                {{ __('messages.student') }}
                            </th>


                            @if($selectedLesson)

                                {{-- عند اختيار درس محدد --}}

                                <th>
                                    {{ __('messages.date') }}
                                </th>

                                <th>
                                    {{ __('messages.attendance_time') }}
                                </th>

                                <th>
                                    {{ __('messages.watching_duration') }}
                                </th>

                                <th>
                                    {{ __('messages.attendance_status') }}
                                </th>

                            @else

                                {{-- عند عرض جميع الدروس --}}

                                @foreach(
                                    $course->lessons->when(
                                        $selectedLesson,
                                        fn($lessons) => $lessons->where('id', $selectedLesson)
                                    )
                                    as $lesson
                                )

                                    <th>
                                        {{ $lesson->title }}
                                    </th>

                                @endforeach

                                <th>
                                    {{ __('messages.attendance_percentage') }}
                                </th>

                            @endif

                        </tr>

                    </thead>


                    <tbody>

                        @foreach(
                            $students->when(
                                $selectedStudent,
                                fn($students) => $students->where('id', $selectedStudent)
                            )
                            as $student
                        )

                            @php

                                $presentCountStudent = 0;

                                $visibleLessons = $course->lessons->when(
                                    $selectedLesson,
                                    fn($lessons) => $lessons->where('id', $selectedLesson)
                                );

                                $totalLessonsStudent = $visibleLessons->count();

                            @endphp


                            <tr>

                                {{-- اسم الطالب --}}
                                <td>

                                    <div class="student-name">

                                        <i class="fas fa-user"></i>

                                        {{ $student->name }}

                                    </div>

                                </td>


                                @if($selectedLesson)

                                    @php

                                        $attendance = $attendances
                                            ->where('user_id', $student->id)
                                            ->where('lesson_id', $selectedLesson)
                                            ->first();

                                    @endphp


                                    {{-- التاريخ --}}
                                    <td>

                                        @if($attendance)

                                            {{ \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') }}

                                        @else

                                            -

                                        @endif

                                    </td>


                                    {{-- وقت الحضور --}}
                                    <td>

                                        @if($attendance && $attendance->started_at)

                                            {{ \Carbon\Carbon::parse($attendance->started_at)->format('H:i') }}

                                        @else

                                            -

                                        @endif

                                    </td>


                                    {{-- مدة المشاهدة --}}
                                    <td>

                                        @if($attendance)

                                            {{ $attendance->total_minutes }}

                                            {{ __('messages.minute') }}

                                        @else

                                            -

                                        @endif

                                    </td>


                                    {{-- الحالة --}}
                                    <td>

                                        @if($attendance && $attendance->status === 'present')

                                            <span class="attendance-status present">

                                                <i class="fas fa-circle-check"></i>

                                                {{ __('messages.present') }}

                                            </span>

                                        @else

                                            <span class="attendance-status absent">

                                                <i class="fas fa-circle-xmark"></i>

                                                {{ __('messages.absent') }}

                                            </span>

                                        @endif

                                    </td>


                                @else

                                    {{-- جميع الدروس --}}

                                    @foreach($visibleLessons as $lesson)

                                        @php

                                            $attendance = $attendances
                                                ->where('user_id', $student->id)
                                                ->where('lesson_id', $lesson->id)
                                                ->first();

                                            if (
                                                $attendance &&
                                                $attendance->status === 'present'
                                            ) {
                                                $presentCountStudent++;
                                            }

                                        @endphp


                                        <td>

                                            @if(
                                                $attendance &&
                                                $attendance->status === 'present'
                                            )

                                                <span class="attendance-status present">

                                                    <i class="fas fa-circle-check"></i>

                                                    {{ __('messages.present') }}

                                                </span>

                                            @else

                                                <span class="attendance-status absent">

                                                    <i class="fas fa-circle-xmark"></i>

                                                    {{ __('messages.absent') }}

                                                </span>

                                            @endif

                                        </td>

                                    @endforeach


                                    {{-- نسبة الطالب --}}

                                    @php

                                        $percentageStudent =
                                            $totalLessonsStudent > 0
                                                ? round(
                                                    ($presentCountStudent / $totalLessonsStudent) * 100
                                                )
                                                : 0;

                                    @endphp


                                    <td>

                                        <strong
                                            class="
                                                attendance-percentage
                                                {{ $percentageStudent >= 75 ? 'high' : '' }}
                                                {{ $percentageStudent > 0 && $percentageStudent < 75 ? 'medium' : '' }}
                                                {{ $percentageStudent == 0 ? 'low' : '' }}
                                            ">

                                            {{ $percentageStudent }}%

                                        </strong>

                                    </td>

                                @endif

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="teacher-lesson-empty-content">

                <i class="fas fa-users-slash"></i>

                <span>
                    {{ __('messages.no_students_or_lessons') }}
                </span>

            </div>

        @endif

    </div>


    {{-- BACK --}}

    <div class="teacher-lesson-back">

        <a
            href="{{ route('teacher.courses.show', $course->id) }}"
            class="lesson-back-btn">

            <i class="fas fa-arrow-right"></i>

            {{ __('messages.back_to_course') }}

        </a>

    </div>

</div>

@endsection
