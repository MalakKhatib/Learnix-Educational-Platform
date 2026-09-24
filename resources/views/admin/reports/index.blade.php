@extends('admin.layouts.app')

@section('title', __('messages.admin_statistics_reports'))

@section('content')

<div class="admin-reports-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="admin-reports-header">

        <div class="admin-reports-header-content">

            <div class="admin-reports-header-icon">

                <i class="fas fa-chart-pie"></i>

            </div>


            <div>

                <div class="admin-reports-label">

                    <i class="fas fa-sparkles"></i>

                    {{ __('messages.platform_analysis') }}

                </div>


                <h2>
                    {{ __('messages.admin_statistics_reports') }}
                </h2>


                <p>
                    {{ __('messages.admin_reports_description') }}
                </p>

            </div>

        </div>


        <div class="admin-reports-badge">

            <i class="fas fa-chart-line"></i>

            {{ __('messages.platform_reports') }}

        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="admin-report-statistics">


        {{-- Students --}}

        <div class="admin-report-stat blue">

            <div class="admin-report-stat-icon">

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
                    {{ __('messages.registered_students') }}
                </small>

            </div>

        </div>



        {{-- Teachers --}}

        <div class="admin-report-stat purple">

            <div class="admin-report-stat-icon">

                <i class="fas fa-chalkboard-user"></i>

            </div>

            <div>

                <span>
                    {{ __('messages.total_teachers') }}
                </span>

                <strong>
                    {{ $totalTeachers }}
                </strong>

                <small>
                    {{ __('messages.registered_teachers') }}
                </small>

            </div>

        </div>



        {{-- Courses --}}

        <div class="admin-report-stat green">

            <div class="admin-report-stat-icon">

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
                    {{ __('messages.available_courses') }}
                </small>

            </div>

        </div>



        {{-- Lessons --}}

        <div class="admin-report-stat orange">

            <div class="admin-report-stat-icon">

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
                    {{ __('messages.educational_lessons') }}
                </small>

            </div>

        </div>



        {{-- Quizzes --}}

        <div class="admin-report-stat red">

            <div class="admin-report-stat-icon">

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
                    {{ __('messages.available_quizzes') }}
                </small>

            </div>

        </div>

    </div>



    {{-- =====================================================
         CHART
    ====================================================== --}}

    <div class="admin-report-chart-card">


        <div class="admin-report-chart-header">

            <div>

                <div class="admin-reports-section-label">

                    <i class="fas fa-chart-pie"></i>

                    {{ __('messages.platform_distribution') }}

                </div>


                <h3>
                    {{ __('messages.platform_statistics') }}
                </h3>


                <p>
                    {{ __('messages.platform_statistics_description') }}
                </p>

            </div>


            <div class="admin-report-chart-icon">

                <i class="fas fa-chart-pie"></i>

            </div>

        </div>



        <div class="admin-report-chart-container">

            <canvas id="platformChart"></canvas>

        </div>

    </div>



    {{-- =====================================================
         REPORT SUMMARY
    ====================================================== --}}

    <div class="admin-report-summary-card">

        <div class="admin-report-summary-icon">

            <i class="fas fa-layer-group"></i>

        </div>


        <div>

            <h3>
                {{ __('messages.platform_summary') }}
            </h3>


            <p>

                {{ __('messages.platform_currently_contains') }}

                <strong>
                    {{ $totalStudents }}
                </strong>

                {{ __('messages.students_text') }}

                <strong>
                    {{ $totalTeachers }}
                </strong>

                {{ __('messages.teachers_text') }}

                {{ __('messages.and_text') }}

                <strong>
                    {{ $totalCourses }}
                </strong>

                {{ __('messages.educational_courses_text') }}

            </p>

        </div>

    </div>



    {{-- =====================================================
         PDF
    ====================================================== --}}

    <div class="admin-report-export-card">


        <div class="admin-report-pdf-icon">

            <i class="fas fa-file-pdf"></i>

        </div>


        <div class="admin-report-export-content">

            <h3>
                {{ __('messages.platform_report') }}
            </h3>

            <p>
                {{ __('messages.save_platform_statistics_pdf') }}
            </p>

        </div>


        <a
            href="{{ route('admin.report.pdf') }}"
            class="admin-report-pdf-btn">

            <i class="fas fa-download"></i>

            {{ __('messages.download_report_pdf') }}

        </a>

    </div>


</div>



{{-- =====================================================
     PLATFORM CHART SCRIPT
====================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const platformCanvas =
        document.getElementById('platformChart');


    if (!platformCanvas) {
        return;
    }


    const platformData =
        @json($platformStatistics);


    new Chart(
        platformCanvas,
        {

            type: 'doughnut',


            data: {

                labels: [

                    @json(__('messages.students')),

                    @json(__('messages.teachers')),

                    @json(__('messages.courses'))

                ],


                datasets: [{

                    label:
                        @json(__('messages.platform_statistics')),

                    data:
                        platformData,

                    borderWidth: 0,

                    hoverOffset: 8

                }]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '62%',


                plugins: {

                    legend: {

                        position: 'bottom',


                        labels: {

                            color:
                                document.body.classList.contains('dark-mode')
                                    ? '#d6cedd'
                                    : '#6f6677',


                            padding: 18,


                            font: {

                                family: 'Cairo',

                                size: 11

                            }

                        }

                    }

                }

            }

        }

    );

});

</script>



{{-- =====================================================
     USER REPORTS
====================================================== --}}

<div class="admin-user-reports-card">


    <div class="admin-user-reports-header">

        <div class="admin-user-reports-title">


            <div class="admin-user-reports-icon">

                <i class="fas fa-users"></i>

            </div>


            <div>

                <div class="admin-reports-section-label">

                    <i class="fas fa-file-lines"></i>

                    User Reports

                </div>


                <h3>
                    Individual User Reports
                </h3>


                <p>
                    Generate a detailed report containing the activity and performance of each user.
                </p>

            </div>

        </div>

    </div>



    <div class="admin-users-report-table-wrapper">


        <table class="admin-users-report-table">


            <thead>

                <tr>

                    <th>
                        #
                    </th>

                    <th>
                        User
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        Role
                    </th>

                    <th>
                        Report
                    </th>

                </tr>

            </thead>



            <tbody>

                @forelse($users as $user)

                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>

                            <div class="admin-report-user-info">


                                <div class="admin-report-user-avatar">

                                    @if($user->profile_image)

                                        <img
                                            src="{{ asset('storage/' . $user->profile_image) }}"
                                            alt="{{ $user->name }}"
                                        >

                                    @else

                                        <i class="fas fa-user"></i>

                                    @endif

                                </div>


                                <strong>
                                    {{ $user->name }}
                                </strong>


                            </div>

                        </td>


                        <td>
                            {{ $user->email }}
                        </td>


                        <td>


                            @if($user->role === 'student')

                                <span class="admin-role-badge student-role">

                                    <i class="fas fa-user-graduate"></i>

                                    Student

                                </span>


                            @elseif($user->role === 'teacher')

                                <span class="admin-role-badge teacher-role">

                                    <i class="fas fa-chalkboard-user"></i>

                                    Teacher

                                </span>


                            @else

                                <span class="admin-role-badge admin-role">

                                    <i class="fas fa-user-shield"></i>

                                    Admin

                                </span>

                            @endif


                        </td>


                        <td>


                            <a
                                href="{{ route('admin.user.report.pdf', $user->id) }}"
                                class="admin-user-report-btn"
                            >

                                <i class="fas fa-file-pdf"></i>

                                Download Report

                            </a>


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="5"
                            class="admin-no-users"
                        >

                            <i class="fas fa-users-slash"></i>

                            <span>
                                No users found.
                            </span>

                        </td>

                    </tr>


                @endforelse

            </tbody>


        </table>

    </div>

</div>



<style>

.admin-user-reports-card {
    margin-top: 25px;
    background: #ffffff;
    border: 1px solid #ece8f2;
    border-radius: 22px;
    padding: 28px;
    box-shadow: 0 10px 35px rgba(70, 45, 100, 0.07);
}


.admin-user-reports-header {
    margin-bottom: 25px;
}


.admin-user-reports-title {
    display: flex;
    align-items: center;
    gap: 16px;
}


.admin-user-reports-icon {
    width: 55px;
    height: 55px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #6d28d9, #8b5cf6);
    color: white;
    font-size: 21px;
    flex-shrink: 0;
}


.admin-user-reports-title h3 {
    margin: 5px 0;
    font-size: 20px;
    color: #2d2635;
}


.admin-user-reports-title p {
    margin: 0;
    color: #827889;
    font-size: 13px;
}


.admin-users-report-table-wrapper {
    width: 100%;
    overflow-x: auto;
}


.admin-users-report-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 760px;
}


.admin-users-report-table thead th {
    padding: 15px 14px;
    text-align: left;
    background: #f8f6fb;
    color: #6d6373;
    font-size: 12px;
    font-weight: 800;
    border-bottom: 1px solid #ebe6f1;
}


.admin-users-report-table tbody td {
    padding: 15px 14px;
    border-bottom: 1px solid #f0edf4;
    color: #5e5665;
    font-size: 13px;
}


.admin-users-report-table tbody tr {
    transition: .2s;
}


.admin-users-report-table tbody tr:hover {
    background: #faf8fd;
}


.admin-report-user-info {
    display: flex;
    align-items: center;
    gap: 11px;
}


.admin-report-user-avatar {
    width: 38px;
    height: 38px;
    border-radius: 12px;
    background: #f0eafd;
    color: #6d28d9;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}


.admin-report-user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


.admin-report-user-info strong {
    color: #302837;
    font-size: 13px;
}


.admin-role-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 11px;
    border-radius: 9px;
    font-size: 11px;
    font-weight: 800;
}


.student-role {
    background: #eef5ff;
    color: #2563eb;
}


.teacher-role {
    background: #f2edff;
    color: #7c3aed;
}


.admin-role {
    background: #fff1f1;
    color: #dc2626;
}


.admin-user-report-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 9px 13px;
    border-radius: 10px;
    background: linear-gradient(135deg, #6d28d9, #8b5cf6);
    color: white;
    text-decoration: none;
    font-size: 11px;
    font-weight: 800;
    transition: .25s;
    white-space: nowrap;
}


.admin-user-report-btn:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 7px 18px rgba(109, 40, 217, .22);
}


.admin-no-users {
    text-align: center;
    padding: 35px !important;
}


.admin-no-users i {
    display: block;
    font-size: 28px;
    color: #b8afc0;
    margin-bottom: 8px;
}


.admin-no-users span {
    color: #918797;
}


html[dir="rtl"] .admin-users-report-table thead th,
html[dir="rtl"] .admin-users-report-table tbody td {
    text-align: right;
}

</style>


@endsection
