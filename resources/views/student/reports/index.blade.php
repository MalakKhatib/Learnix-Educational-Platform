@extends('student.layouts.app')

@section('title', __('messages.reports_page_title'))

@section('content')

<div class="student-reports-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="reports-page-header">

        <div class="reports-header-content">

            <div class="reports-header-icon">

                <i class="fas fa-chart-pie"></i>

            </div>

            <div>

                <div class="reports-header-label">

                    <i class="fas fa-chart-line"></i>

                    {{ __('messages.performance_analysis') }}

                </div>

                <h2>

                    {{ __('messages.reports_page_title') }}

                </h2>

                <p>

                    {{ __('messages.reports_description') }}

                </p>

            </div>

        </div>


        <div class="reports-pdf-link">

            <a
                href="{{ route('student.report.pdf') }}"
                target="_blank">

                <i class="fas fa-file-pdf"></i>

                {{ __('messages.export_pdf') }}

            </a>

        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="reports-stats-grid">


        {{-- Courses --}}

        <div class="reports-stat-card">

            <div class="reports-stat-icon purple">

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

                    {{ __('messages.registered_course') }}

                </small>

            </div>

        </div>



        {{-- Lessons --}}

        <div class="reports-stat-card">

            <div class="reports-stat-icon blue">

                <i class="fas fa-circle-check"></i>

            </div>

            <div>

                <span>

                    {{ __('messages.completed_lessons') }}

                </span>

                <strong>

                    {{ $completedLessons }}

                </strong>

                <small>

                    {{ __('messages.completed_lesson') }}

                </small>

            </div>

        </div>



        {{-- Quizzes --}}

        <div class="reports-stat-card">

            <div class="reports-stat-icon green">

                <i class="fas fa-clipboard-check"></i>

            </div>

            <div>

                <span>

                    {{ __('messages.solved_quizzes') }}

                </span>

                <strong>

                    {{ $totalQuizzes }}

                </strong>

                <small>

                    {{ __('messages.quiz') }}

                </small>

            </div>

        </div>



        {{-- Average --}}

        <div class="reports-stat-card">

            <div class="reports-stat-icon orange">

                <i class="fas fa-star"></i>

            </div>

            <div>

                <span>

                    {{ __('messages.average_results') }}

                </span>

                <strong>

                    {{ $averageScore }}%

                </strong>

                <small>

                    {{ __('messages.average_performance') }}

                </small>

            </div>

        </div>


    </div>



    {{-- =====================================================
         COMPLETION
    ====================================================== --}}

    <div class="reports-progress-card">

        <div class="reports-progress-header">

            <div>

                <div class="reports-section-label">

                    <i class="fas fa-bullseye"></i>

                    {{ __('messages.educational_progress') }}

                </div>

                <h3>

                    {{ __('messages.overall_completion_percentage') }}

                </h3>

                <p>

                    {{ __('messages.overall_completion_description') }}

                </p>

            </div>


            <div class="reports-progress-value">

                {{ $completionPercentage }}%

            </div>

        </div>


        <div class="reports-progress">

            <div
                class="reports-progress-bar"
                style="width: {{ $completionPercentage }}%;">
            </div>

        </div>


        <div class="reports-progress-footer">

            <span>

                <i class="fas fa-circle"></i>

                {{ __('messages.completed') }}

            </span>

            <span>

                {{ $completionPercentage }}%

            </span>

        </div>

    </div>



    {{-- =====================================================
         CHARTS
    ====================================================== --}}

    <div class="reports-charts-grid">


        {{-- Lessons Chart --}}

        <div class="reports-chart-card">

            <div class="reports-chart-header">

                <div>

                    <div class="reports-section-label">

                        <i class="fas fa-chart-pie"></i>

                        {{ __('messages.lesson_progress') }}

                    </div>

                    <h3>

                        {{ __('messages.lesson_completion') }}

                    </h3>

                    <p>

                        {{ __('messages.completed_and_remaining_lessons') }}

                    </p>

                </div>


                <div class="reports-chart-icon purple-chart">

                    <i class="fas fa-chart-pie"></i>

                </div>

            </div>


            <div class="reports-chart-container pie-chart-container">

                <canvas id="completionChart"></canvas>

            </div>

        </div>



        {{-- Quiz Chart --}}

        <div class="reports-chart-card">

            <div class="reports-chart-header">

                <div>

                    <div class="reports-section-label green-label">

                        <i class="fas fa-chart-column"></i>

                        {{ __('messages.quiz_results') }}

                    </div>

                    <h3>

                        {{ __('messages.quiz_performance') }}

                    </h3>

                    <p>

                        {{ __('messages.compare_quiz_results') }}

                    </p>

                </div>


                <div class="reports-chart-icon green-chart">

                    <i class="fas fa-chart-column"></i>

                </div>

            </div>


            <div class="reports-chart-container">

                <canvas id="quizChart"></canvas>

            </div>

        </div>


    </div>



    {{-- =====================================================
         LATEST COURSES
    ====================================================== --}}

    <div class="reports-content-card">

        <div class="reports-content-header">

            <div>

                <div class="reports-section-label">

                    <i class="fas fa-book-open"></i>

                    {{ __('messages.educational_activity') }}

                </div>

                <h3>

                    {{ __('messages.latest_courses') }}

                </h3>

                <p>

                    {{ __('messages.latest_courses_description') }}

                </p>

            </div>


            <a
                href="/my-courses"
                class="reports-view-all">

                {{ __('messages.view_all') }}

                <i class="fas fa-arrow-left"></i>

            </a>

        </div>


        <div class="reports-list">

            @forelse($latestCourses as $course)

                <div class="reports-list-item">

                    <div class="reports-list-icon purple-list">

                        <i class="fas fa-book"></i>

                    </div>


                    <div class="reports-list-info">

                        <strong>

                            {{ $course->title }}

                        </strong>

                        <span>

                            {{ __('messages.educational_course') }}

                        </span>

                    </div>


                    <i class="fas fa-chevron-left reports-arrow"></i>

                </div>

            @empty

                <div class="reports-empty-inline">

                    <i class="fas fa-book-open"></i>

                    <span>

                        {{ __('messages.no_courses_yet') }}

                    </span>

                </div>

            @endforelse

        </div>

    </div>



    {{-- =====================================================
         LATEST QUIZZES
    ====================================================== --}}

    <div class="reports-content-card">

        <div class="reports-content-header">

            <div>

                <div class="reports-section-label green-label">

                    <i class="fas fa-clipboard-check"></i>

                    {{ __('messages.latest_activities') }}

                </div>

                <h3>

                    {{ __('messages.latest_quiz_results') }}

                </h3>

                <p>

                    {{ __('messages.latest_quizzes_description') }}

                </p>

            </div>


            <a
                href="/student/results"
                class="reports-view-all">

                {{ __('messages.view_results') }}

                <i class="fas fa-arrow-left"></i>

            </a>

        </div>


        <div class="reports-list">

            @forelse($latestAttempts as $attempt)

                @php

                    $attemptTotal =
                        $attempt->quiz->questions->count();

                    $attemptPercentage = 0;

                    if($attemptTotal > 0){

                        $attemptPercentage = round(
                            ($attempt->score / $attemptTotal) * 100
                        );

                    }

                @endphp


                <div class="reports-list-item">

                    <div class="reports-list-icon green-list">

                        <i class="fas fa-clipboard-check"></i>

                    </div>


                    <div class="reports-list-info">

                        <strong>

                            {{ $attempt->quiz->title }}

                        </strong>

                        <span>

                            {{ $attempt->quiz->course->title }}

                        </span>

                    </div>


                    <div class="reports-score">

                        {{ $attemptPercentage }}%

                    </div>


                    <i class="fas fa-chevron-left reports-arrow"></i>

                </div>

            @empty

                <div class="reports-empty-inline">

                    <i class="fas fa-chart-line"></i>

                    <span>

                        {{ __('messages.no_results_yet') }}

                    </span>

                </div>

            @endforelse

        </div>

    </div>



    {{-- =====================================================
         PDF
    ====================================================== --}}

    <div class="reports-pdf-card">

        <div class="reports-pdf-icon">

            <i class="fas fa-file-pdf"></i>

        </div>


        <div class="reports-pdf-content">

            <h3>

                {{ __('messages.your_educational_report_ready') }}

            </h3>

            <p>

                {{ __('messages.educational_report_description') }}

            </p>

        </div>


        <a
            href="{{ route('student.report.pdf') }}"
            class="reports-pdf-btn">

            <i class="fas fa-download"></i>

            {{ __('messages.download_report') }}

        </a>

    </div>


</div>



{{-- =====================================================
     CHARTS SCRIPT
===================================================== --}}

@endsection
@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | مخطط تقدم الدروس
    |--------------------------------------------------------------------------
    */

    const completionCanvas =
        document.getElementById('completionChart');

    if (completionCanvas) {

        new Chart(
            completionCanvas,
            {
                type: 'doughnut',

                data: {

                    labels: [
                        @json(__('messages.completed_lessons')),
                        @json(__('messages.remaining_lessons'))
                    ],

                    datasets: [{

                        data: [
                            {{ $completedLessons }},
                            {{ $remainingLessons }}
                        ],

                        borderWidth: 0

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    cutout: '68%',

                    animation: false,

                    plugins: {

                        legend: {

                            position: 'bottom',

                            labels: {

                                font: {
                                    family: 'Cairo'
                                },

                                padding: 18

                            }

                        }

                    }

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | ترتيب بيانات الاختبارات
    |--------------------------------------------------------------------------
    |
    | نربط اسم الاختبار مع نتيجته أولاً،
    | ثم نرتبهم حسب رقم الاختبار تصاعدياً.
    |
    | مثال:
    | الاختبار 1
    | الاختبار 2
    | الاختبار 3
    | الاختبار 4
    | الاختبار 5
    | الاختبار 6
    |
    |--------------------------------------------------------------------------
    */

    const originalLabels =
        @json($quizLabels);

    const originalScores =
        @json($quizScores);


    const quizData =
        originalLabels.map(function (label, index) {

            const text =
                String(label);

            const numbers =
                text.match(/\d+/);

            const number =
                numbers
                    ? parseInt(numbers[0], 10)
                    : index + 1;


            return {

                label: label,

                score:
                    Number(
                        originalScores[index] ?? 0
                    ),

                number: number,

                originalIndex: index

            };

        });


    /*
    |--------------------------------------------------------------------------
    | ترتيب الاختبارات من 1 إلى الأخير
    |--------------------------------------------------------------------------
    */

    quizData.sort(function (a, b) {

        if (a.number !== b.number) {

            return a.number - b.number;

        }

        return a.originalIndex -
               b.originalIndex;

    });


    /*
    |--------------------------------------------------------------------------
    | تجهيز البيانات النهائية للمخطط
    |--------------------------------------------------------------------------
    */

    const sortedQuizLabels =
        quizData.map(function (item) {

            return item.label;

        });


    const sortedQuizScores =
        quizData.map(function (item) {

            /*
            | حماية النتيجة بين 0 و100
            */

            return Math.min(
                100,
                Math.max(
                    0,
                    item.score
                )
            );

        });


    /*
    |--------------------------------------------------------------------------
    | مخطط نتائج الاختبارات
    |--------------------------------------------------------------------------
    */

    const quizCanvas =
        document.getElementById('quizChart');


    if (quizCanvas) {

        new Chart(
            quizCanvas,
            {

                type: 'bar',

                data: {

                    labels:
                        sortedQuizLabels,

                    datasets: [{

                        label:
                            @json(__('messages.result')),

                        data:
                            sortedQuizScores,

                        borderRadius: 8,

                        borderSkipped: false

                    }]

                },


                options: {

                    responsive: true,

                    maintainAspectRatio: false,


                    /*
                    |--------------------------------------------------------------------------
                    | منع حركة الأعمدة عند تحميل الصفحة
                    |--------------------------------------------------------------------------
                    */

                    animation: false,


                    /*
                    |--------------------------------------------------------------------------
                    | منع Chart.js من تحريك الأعمدة عند إعادة الرسم
                    |--------------------------------------------------------------------------
                    */

                    transitions: {

                        active: {

                            animation: {
                                duration: 0
                            }

                        },

                        resize: {

                            animation: {
                                duration: 0
                            }

                        },

                        show: {

                            animations: {

                                x: {
                                    duration: 0
                                },

                                y: {
                                    duration: 0
                                }

                            }

                        },

                        hide: {

                            animations: {

                                x: {
                                    duration: 0
                                },

                                y: {
                                    duration: 0
                                }

                            }

                        }

                    },


                    /*
                    |--------------------------------------------------------------------------
                    | المحور الأفقي
                    |--------------------------------------------------------------------------
                    */

                    scales: {

                        x: {

                            /*
                            | الاختبار 1 أولاً
                            | ثم 2 ثم 3 ... ثم الأخير
                            */

                            reverse: false,

                            ticks: {

                                font: {
                                    family: 'Cairo'
                                }

                            }

                        },


                        /*
                        |--------------------------------------------------------------------------
                        | المحور العمودي
                        |--------------------------------------------------------------------------
                        */

                        y: {

                            beginAtZero: true,

                            min: 0,

                            max: 100,

                            ticks: {

                                stepSize: 10,

                                callback:
                                    function(value) {

                                        return value + '%';

                                    }

                            }

                        }

                    },


                    /*
                    |--------------------------------------------------------------------------
                    | إخفاء Legend
                    |--------------------------------------------------------------------------
                    */

                    plugins: {

                        legend: {

                            display: false

                        }

                    }

                }

            }

        );

    }

});

</script>

@endpush
