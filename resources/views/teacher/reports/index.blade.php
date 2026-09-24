@extends('teacher.layouts.app')

@section('title', __('messages.teacher_reports'))

@section('content')

<div class="teacher-reports-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="teacher-reports-header">

        <div class="teacher-reports-header-content">

            <div class="teacher-reports-icon">

                <i class="fas fa-chart-pie"></i>

            </div>

            <div>

                <div class="teacher-reports-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.reports_dashboard') }}

                </div>

                <h2>
                    {{ __('messages.teacher_statistics_reports') }}
                </h2>

                <p>
                    {{ __('messages.teacher_reports_description') }}
                </p>

            </div>

        </div>


        <div class="teacher-reports-badge">

            <i class="fas fa-chart-line"></i>

            {{ __('messages.teacher_reports') }}

        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="teacher-report-statistics">


        {{-- Courses --}}

        <div class="teacher-report-stat purple">

            <div class="teacher-report-stat-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.total_courses') }}
                </span>

                <strong>
                    {{ $totalCourses }}
                </strong>

                <small>
                    {{ __('messages.courses_created_by_you') }}
                </small>

            </div>

        </div>



        {{-- Students --}}

        <div class="teacher-report-stat blue">

            <div class="teacher-report-stat-icon">

                <i class="fas fa-user-graduate"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.total_students') }}
                </span>

                <strong>
                    {{ $totalStudents }}
                </strong>

                <small>
                    {{ __('messages.students_enrolled_in_your_courses') }}
                </small>

            </div>

        </div>



        {{-- Lessons --}}

        <div class="teacher-report-stat green">

            <div class="teacher-report-stat-icon">

                <i class="fas fa-book"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.total_lessons') }}
                </span>

                <strong>
                    {{ $totalLessons }}
                </strong>

                <small>
                    {{ __('messages.lessons_in_your_courses') }}
                </small>

            </div>

        </div>



        {{-- Quizzes --}}

        <div class="teacher-report-stat orange">

            <div class="teacher-report-stat-icon">

                <i class="fas fa-clipboard-question"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.total_quizzes') }}
                </span>

                <strong>
                    {{ $totalQuizzes }}
                </strong>

                <small>
                    {{ __('messages.quizzes_created_by_you') }}
                </small>

            </div>

        </div>

    </div>



    {{-- =====================================================
         CHART
    ====================================================== --}}

    <div class="teacher-report-chart-card">

        <div class="teacher-report-chart-header">

            <div>

                <div class="teacher-reports-section-label">

                    <i class="fas fa-chart-column"></i>

                    {{ __('messages.student_statistics') }}

                </div>

                <h3>
                    {{ __('messages.students_enrolled_each_course') }}
                </h3>

                <p>
                    {{ __('messages.compare_students_per_course') }}
                </p>

            </div>


            <div class="teacher-report-chart-icon">

                <i class="fas fa-chart-simple"></i>

            </div>

        </div>


        <div class="teacher-report-chart-container">

            @if($totalCourses > 0)

                <canvas id="teacherStudentsChart"></canvas>

            @else

                <div class="teacher-report-empty">

                    <div class="teacher-report-empty-icon">

                        <i class="fas fa-chart-column"></i>

                    </div>

                    <h4>
                        {{ __('messages.no_data_yet') }}
                    </h4>

                    <p>
                        {{ __('messages.create_course_add_students_chart') }}
                    </p>

                </div>

            @endif

        </div>

    </div>



    {{-- =====================================================
         REPORT DETAILS
    ====================================================== --}}

    <div class="teacher-report-info-card">

        <div class="teacher-report-info-icon">

            <i class="fas fa-file-lines"></i>

        </div>

        <div class="teacher-report-info-content">

            <h3>
                {{ __('messages.your_educational_report') }}
            </h3>

            <p>
                {{ __('messages.your_educational_report_description') }}
            </p>

        </div>

    </div>



    {{-- =====================================================
         PDF
    ====================================================== --}}

    <div class="teacher-report-export-card">

        <div class="teacher-report-export-icon">

            <i class="fas fa-file-pdf"></i>

        </div>

        <div class="teacher-report-export-content">

            <h3>
                {{ __('messages.export_report') }}
            </h3>

            <p>
                {{ __('messages.export_report_description') }}
            </p>

        </div>


        <a
            href="{{ route('teacher.report.pdf') }}"
            class="teacher-report-pdf-btn">

            <i class="fas fa-download"></i>

            {{ __('messages.download_report_pdf') }}

        </a>

    </div>

</div>



@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const canvas =
        document.getElementById('teacherStudentsChart');


    if (!canvas) {
        return;
    }


    new Chart(

        canvas,

        {

            type: 'bar',

            data: {

                labels:
                    @json($courseNames),

                datasets: [{

                    label:
                        @json(__('messages.number_of_students')),

                    data:
                        @json($studentsCount),

                    borderRadius: 10,

                    borderSkipped: false

                }]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,


                scales: {

                    x: {

                        ticks: {

                            color: document.body.classList.contains('dark-mode')
                                ? '#c9c0d1'
                                : '#6f6677'

                        },

                        grid: {

                            display: false

                        }

                    },

                    y: {

                        beginAtZero: true,

                        ticks: {

                            precision: 0,

                            color: document.body.classList.contains('dark-mode')
                                ? '#c9c0d1'
                                : '#6f6677'

                        },

                        grid: {

                            color: document.body.classList.contains('dark-mode')
                                ? '#4a4154'
                                : '#eeeaf5'

                        }

                    }

                },


                plugins: {

                    legend: {

                        display: false

                    }

                }

            }

        }

    );

});

</script>

@endpush

@endsection
