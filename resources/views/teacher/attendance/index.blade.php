@extends('teacher.layouts.app')

@section('title', __('messages.attendance'))

@section('content')

<div class="teacher-lesson-show-page">

    {{-- ================================
         HEADER
    ================================= --}}

    <div class="teacher-lesson-header">

        <div class="teacher-lesson-header-info">

            <div class="teacher-lesson-header-icon">

                <i class="fas fa-user-check"></i>

            </div>

            <div>

                <div class="teacher-section-label">

                    <i class="fas fa-clipboard-check"></i>

                    {{ __('messages.attendance') }}

                </div>

                <h2>
                    {{ $lesson->title }}
                </h2>

                <p>
                    {{ __('messages.attendance_lesson_description') }}
                </p>

            </div>

        </div>

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
                    {{ __('messages.students_attendance') }}
                </h3>

                <p>
                    {{ __('messages.students_required_watch_percentage') }}
                </p>

            </div>

        </div>


        @if($attendances->count() > 0)

            <div class="table-responsive">

                <table class="table">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>{{ __('messages.student') }}</th>

                            <th>{{ __('messages.date') }}</th>

                            <th>{{ __('messages.attendance_time') }}</th>

                            <th>{{ __('messages.watching_duration') }}</th>

                            <th>{{ __('messages.attendance_status') }}</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($attendances as $index => $attendance)

                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>

                                    <div class="student-name">

                                        <i class="fas fa-user"></i>

                                        {{ $attendance->user->name }}

                                    </div>

                                </td>

                                <td>
                                    {{ $attendance->date }}
                                </td>

                                <td>

                                    @if($attendance->started_at)

                                        {{ \Carbon\Carbon::parse($attendance->started_at)->format('H:i') }}

                                    @else

                                        -

                                    @endif

                                </td>

                                <td>

                                    {{ $attendance->total_minutes }}

                                    {{ __('messages.minute') }}

                                </td>

                                <td>

                                    @if($attendance->status === 'present')

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

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="teacher-lesson-empty-content">

                <i class="fas fa-user-clock"></i>

                <span>
                    {{ __('messages.no_attendance_recorded') }}
                </span>

            </div>

        @endif

    </div>


    {{-- ================================
         BACK
    ================================= --}}

    <div class="teacher-lesson-back">

        <a
            href="{{ route('teacher.lessons.show', $lesson->id) }}"
            class="lesson-back-btn">

            <i class="fas fa-arrow-right"></i>

            {{ __('messages.back_to_lesson') }}

        </a>

    </div>

</div>

@endsection
