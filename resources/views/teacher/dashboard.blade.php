@extends('teacher.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'لوحة المعلم' : 'Teacher Dashboard')

@section('content')

<div class="teacher-dashboard-page">


    {{-- =====================================================
         WELCOME
    ====================================================== --}}

    <div class="teacher-welcome-card">

        <div class="teacher-welcome-content">

            <div class="teacher-welcome-icon">
                <i class="fas fa-chalkboard-user"></i>
            </div>

            <div>

                <div class="teacher-small-label">

                    <i class="fas fa-sparkles"></i>

                    {{ app()->getLocale() === 'ar' ? 'لوحة المعلم' : 'Teacher Dashboard' }}

                </div>

                <h2>
                                        {{ app()->getLocale() === 'ar' ? 'أهلاً' : 'Hello' }}
 {{ auth()->user()->name }}
                </h2>

                <p>
                    {{ app()->getLocale() === 'ar' ? 'من هنا يمكنك إدارة كورساتك ودروسك واختباراتك ومتابعة طلابك بكل سهولة.' : 'From here you can manage your courses, lessons, quizzes, and follow up with your students easily.' }}
                </p>

            </div>

        </div>


        <div class="teacher-welcome-badge">

            <i class="fas fa-graduation-cap"></i>

            {{ app()->getLocale() === 'ar' ? 'معلّم' : 'Teacher' }}

        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="teacher-statistics-grid">


        {{-- Courses --}}

        <div class="teacher-stat-card purple">

            <div class="teacher-stat-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div class="teacher-stat-info">

                <span>
                    {{ app()->getLocale() === 'ar' ? 'إجمالي الكورسات' : 'Total Courses' }}
                </span>

                <strong>
                    {{ $totalCourses ?? 0 }}
                </strong>

                <small>
                    {{ app()->getLocale() === 'ar' ? 'الكورسات التي أنشأتها' : 'Courses You Created' }}
                </small>

            </div>

        </div>



        {{-- Students --}}

        <div class="teacher-stat-card blue">

            <div class="teacher-stat-icon">

                <i class="fas fa-user-graduate"></i>

            </div>

            <div class="teacher-stat-info">

                <span>
                    {{ app()->getLocale() === 'ar' ? 'الطلاب' : 'Students' }}
                </span>

                <strong>
                    {{ $totalStudents ?? 0 }}
                </strong>

                <small>
                    {{ app()->getLocale() === 'ar' ? 'الطلاب المسجلون بكورساتك' : 'Students Enrolled in Your Courses' }}
                </small>

            </div>

        </div>



        {{-- Lessons --}}

        <div class="teacher-stat-card green">

            <div class="teacher-stat-icon">

                <i class="fas fa-book"></i>

            </div>

            <div class="teacher-stat-info">

                <span>
                    {{ app()->getLocale() === 'ar' ? 'الدروس' : 'Lessons' }}
                </span>

                <strong>
                    {{ $totalLessons ?? 0 }}
                </strong>

                <small>
                    {{ app()->getLocale() === 'ar' ? 'إجمالي الدروس' : 'Total Lessons' }}
                </small>

            </div>

        </div>



        {{-- Quizzes --}}

        <div class="teacher-stat-card orange">

            <div class="teacher-stat-icon">

                <i class="fas fa-clipboard-question"></i>

            </div>

            <div class="teacher-stat-info">

                <span>
                    {{ app()->getLocale() === 'ar' ? 'الاختبارات' : 'Quizzes' }}
                </span>

                <strong>
                    {{ $totalQuizzes ?? 0 }}
                </strong>

                <small>
                    {{ app()->getLocale() === 'ar' ? 'الاختبارات التي أنشأتها' : 'Quizzes You Created' }}
                </small>

            </div>

        </div>


    </div>



    {{-- =====================================================
         QUICK ACTIONS
    ====================================================== --}}

    <div class="teacher-section-title">

        <div>

            <div class="teacher-section-label">

                <i class="fas fa-bolt"></i>

                {{ app()->getLocale() === 'ar' ? 'اختصارات' : 'Shortcuts' }}

            </div>

            <h3>
                {{ app()->getLocale() === 'ar' ? 'الوصول السريع' : 'Quick Access' }}
            </h3>

        </div>

    </div>



    <div class="teacher-quick-grid">


        <a
            href="/teacher/courses"
            class="teacher-quick-card purple">

            <div class="teacher-quick-icon">

             <i class="fas fa-book-open"></i>

            </div>

            <div>

                <strong>
                    {{ app()->getLocale() === 'ar' ? 'كورساتي' : 'My Courses' }}
                </strong>

                <span>
                    {{ app()->getLocale() === 'ar' ? 'عرض وإدارة الكورسات' : 'View and Manage Courses' }}
                </span>

            </div>

            <i class="fas fa-arrow-left teacher-quick-arrow"></i>

        </a>



        <a
            href="/teacher/courses/create"
            class="teacher-quick-card green">

            <div class="teacher-quick-icon">

                <i class="fas fa-plus"></i>

            </div>

            <div>

                <strong>
                    {{ app()->getLocale() === 'ar' ? 'إنشاء كورس' : 'Create Course' }}
                </strong>

                <span>
                    {{ app()->getLocale() === 'ar' ? 'أضف كورساً جديداً' : 'Add a New Course' }}
                </span>

            </div>

            <i class="fas fa-arrow-left teacher-quick-arrow"></i>

        </a>


    </div>



    {{-- =====================================================
         STUDENTS CHART
    ====================================================== --}}

    <div class="teacher-chart-card">


        <div class="teacher-chart-header">

            <div>

                <div class="teacher-section-label">

                    <i class="fas fa-chart-column"></i>

                    {{ app()->getLocale() === 'ar' ? 'إحصائيات الطلاب' : 'Student Statistics' }}

                </div>

                <h3>
                    {{ app()->getLocale() === 'ar' ? 'الطلاب المسجلون في كل كورس' : 'Students Enrolled in Each Course' }}
                </h3>

                <p>
                    {{ app()->getLocale() === 'ar' ? 'نظرة سريعة على عدد الطلاب المسجلين في كل كورس من كورساتك.' : 'A quick overview of the number of students enrolled in each of your courses.' }}
                </p>

            </div>


            <div class="teacher-chart-icon">

                <i class="fas fa-chart-simple"></i>

            </div>

        </div>



        <div class="teacher-chart-container">

            @if(($totalCourses ?? 0) > 0)

                <canvas id="studentsChart"></canvas>

            @else

                <div class="teacher-chart-empty">

                    <div>

                        <i class="fas fa-chart-column"></i>

                    </div>

                    <h4>
                        {{ app()->getLocale() === 'ar' ? 'لا توجد بيانات بعد' : 'No Data Yet' }}
                    </h4>

                    <p>
                        {{ app()->getLocale() === 'ar' ? 'أنشئ أول كورس لك لتظهر إحصائيات الطلاب هنا.' : 'Create your first course to see student statistics here.' }}
                    </p>

                </div>

            @endif

        </div>

    </div>



    {{-- =====================================================
         EMPTY COURSES
    ====================================================== --}}

    @if(($totalCourses ?? 0) == 0)

        <div class="teacher-empty-card">

            <div class="teacher-empty-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <h3>
                    {{ app()->getLocale() === 'ar' ? 'لم تقم بإنشاء أي كورس بعد' : 'You Have Not Created Any Course Yet' }}
                </h3>

                <p>
                    {{ app()->getLocale() === 'ar' ? 'ابدأ الآن بإنشاء أول كورس وشارك معرفتك مع الطلاب.' : 'Start by creating your first course and share your knowledge with students.' }}
                </p>

            </div>

            <a
                href="/teacher/courses/create"
                class="teacher-empty-btn">

                <i class="fas fa-plus"></i>

                {{ app()->getLocale() === 'ar' ? 'إنشاء أول كورس' : 'Create Your First Course' }}

            </a>

        </div>

    @endif


</div>



{{-- =====================================================
     STUDENTS CHART SCRIPT
===================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const studentsCanvas =
        document.getElementById('studentsChart');


    if (!studentsCanvas) {
        return;
    }


    new Chart(

        studentsCanvas,

        {

            type: 'bar',

            data: {

                labels:
                    @json($courseNames ?? []),

                datasets: [{

                    label:
                        @json(app()->getLocale() === 'ar' ? 'عدد الطلاب' : 'Number of Students'),

                    data:
                        @json($studentsCount ?? []),

                    borderRadius: 12,

                    borderSkipped: false,

                    barPercentage: 0.55,

                    categoryPercentage: 0.65

                }]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,


                animation: {

                    duration: 900

                },


                scales: {

                   x: {

    grid: {

        display: false

    },

    ticks: {

        color: document.body.classList.contains('dark-mode')
            ? '#c9c0d1'
            : '#6f6677',

        font: {

            size: 12

        }

    }

},


                   y: {

    beginAtZero: true,

    ticks: {

        precision: 0,

        color: document.body.classList.contains('dark-mode')
            ? '#c9c0d1'
            : '#6f6677',

        font: {

            size: 11

        }

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

                    },


                    tooltip: {

                        rtl: true,

                        displayColors: false,


                        callbacks: {

                            label: function(context) {

                                return @json(app()->getLocale() === 'ar' ? 'عدد الطلاب: ' : 'Students: ') +
                                    context.parsed.y;

                            }

                        }

                    }

                }

            }

        }

    );

});

</script>


@endsection
