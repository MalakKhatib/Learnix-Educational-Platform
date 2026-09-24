<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">

    <title>Student Performance Report</title>

    <style>

        @page {
            margin: 32px 38px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            direction: ltr;
            color: #30303b;
            font-size: 11px;
            margin: 0;
            background: #ffffff;
        }

        .header {
            background: #6d28d9;
            color: #ffffff;
            padding: 24px 26px;
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .brand {
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 7px;
            text-transform: uppercase;
        }

        .title {
            font-size: 23px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            font-size: 10px;
            color: #eee7ff;
            margin-top: 7px;
        }

        .section {
            margin-top: 23px;
        }

        .section-title {
            color: #4c1d95;
            font-size: 14px;
            font-weight: bold;
            padding-bottom: 7px;
            margin-bottom: 11px;
            border-bottom: 2px solid #eee8f8;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 9px 11px;
            border-bottom: 1px solid #eeeeF3;
        }

        .info-label {
            width: 30%;
            color: #77727e;
            font-weight: bold;
        }

        .info-value {
            color: #292531;
            font-weight: bold;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 7px;
            margin-left: -7px;
            margin-right: -7px;
        }

        .summary-card {
            width: 25%;
            background: #faf9fc;
            border: 1px solid #ece8f3;
            border-radius: 10px;
            padding: 14px 7px;
            text-align: center;
        }

        .summary-number {
            display: block;
            font-size: 21px;
            font-weight: bold;
            color: #6d28d9;
            margin-bottom: 5px;
        }

        .summary-label {
            display: block;
            color: #716b78;
            font-size: 9px;
            font-weight: bold;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #eeeaf4;
            border-radius: 8px;
            margin-top: 6px;
        }

        .progress-fill {
            height: 8px;
            background: #6d28d9;
            border-radius: 8px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .data-table th {
            background: #f3effb;
            color: #4c1d95;
            font-weight: bold;
            padding: 9px 8px;
            border: 1px solid #e7e1f0;
            text-align: center;
        }

        .data-table td {
            padding: 9px 8px;
            border: 1px solid #e7e1f0;
            text-align: center;
            color: #4f4857;
        }

        .data-table tr:nth-child(even) td {
            background: #fbfafc;
        }

        .percentage {
            font-weight: bold;
            color: #6d28d9;
        }

        .course-progress {
            margin-top: 4px;
            color: #77727e;
            font-size: 9px;
        }

        .empty {
            text-align: center !important;
            color: #99939f !important;
            padding: 16px !important;
        }

        .highlight {
            background: #f8f5fc;
            border-left: 4px solid #6d28d9;
            padding: 14px 16px;
            border-radius: 8px;
            margin-top: 12px;
            line-height: 1.7;
            color: #5e5767;
        }

        .highlight strong {
            color: #4c1d95;
        }

        .footer {
            margin-top: 30px;
            padding-top: 11px;
            border-top: 1px solid #e6e2eb;
            text-align: center;
            color: #918b98;
            font-size: 8px;
        }

        .footer-brand {
            color: #6d28d9;
            font-weight: bold;
        }

    </style>

</head>


<body>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="header">

        <div class="brand">
            LEARNIX EDUCATIONAL PLATFORM
        </div>

        <h1 class="title">
            Student Performance Report
        </h1>

        <div class="subtitle">
            Academic progress, course activity, assessment results and attendance
        </div>

    </div>


    {{-- =====================================================
         STUDENT INFORMATION
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Student Information
        </div>


        <table class="info-table">

            <tr>

                <td class="info-label">
                    Full Name
                </td>

                <td class="info-value">
                    {{ $user->name }}
                </td>

            </tr>


            <tr>

                <td class="info-label">
                    Email Address
                </td>

                <td class="info-value">
                    {{ $user->email }}
                </td>

            </tr>


            <tr>

                <td class="info-label">
                    University ID
                </td>

                <td class="info-value">
                    {{ $user->university_id ?? 'Not Available' }}
                </td>

            </tr>


            <tr>

                <td class="info-label">
                    Phone Number
                </td>

                <td class="info-value">
                    {{ $user->phone ?? 'Not Available' }}
                </td>

            </tr>


            <tr>

                <td class="info-label">
                    Account Role
                </td>

                <td class="info-value">
                    Student
                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         ACADEMIC OVERVIEW
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Academic Overview
        </div>


        <table class="summary-table">

            <tr>

                <td class="summary-card">

                    <span class="summary-number">
                        {{ $totalCourses }}
                    </span>

                    <span class="summary-label">
                        Enrolled Courses
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $totalLessons }}
                    </span>

                    <span class="summary-label">
                        Total Lessons
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $completedLessons }}
                    </span>

                    <span class="summary-label">
                        Completed Lessons
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $remainingLessons }}
                    </span>

                    <span class="summary-label">
                        Remaining Lessons
                    </span>

                </td>

            </tr>

        </table>


        <div class="highlight">

            <strong>Overall Course Progress:</strong>

            {{ $completionPercentage }}%

            <div class="progress-bar">

                <div
                    class="progress-fill"
                    style="width: {{ min(100, max(0, $completionPercentage)) }}%;"
                ></div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         ENROLLED COURSES
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Enrolled Courses
        </div>


        <table class="data-table">

            <thead>

                <tr>

                    <th>
                        Course
                    </th>

                    <th>
                        Teacher
                    </th>

                    <th>
                        Lessons
                    </th>

                    <th>
                        Completed
                    </th>

                    <th>
                        Progress
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($courses as $course)

                    <tr>

                        <td>
                            {{ $course->title }}
                        </td>

                        <td>
                            {{ $course->teacher->name ?? 'Not Assigned' }}
                        </td>

                        <td>
                            {{ $course->total_lessons_count }}
                        </td>

                        <td>
                            {{ $course->completed_lessons_count }}
                        </td>

                        <td>

                            <span class="percentage">
                                {{ $course->progress_percentage }}%
                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="empty"
                        >
                            No enrolled courses found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =====================================================
         ASSESSMENT & ATTENDANCE SUMMARY
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Assessment & Attendance Summary
        </div>


        <table class="summary-table">

            <tr>

                <td class="summary-card">

                    <span class="summary-number">
                        {{ $totalAttempts }}
                    </span>

                    <span class="summary-label">
                        Quiz Attempts
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $averageScore }}%
                    </span>

                    <span class="summary-label">
                        Average Quiz Score
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $attendanceCount }}
                    </span>

                    <span class="summary-label">
                        Attendance Records
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $attendancePercentage }}%
                    </span>

                    <span class="summary-label">
                        Attendance Rate
                    </span>

                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         QUIZ RESULTS
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Recent Quiz Results
        </div>


        <table class="data-table">

            <thead>

                <tr>

                    <th>
                        Quiz
                    </th>

                    <th>
                        Course
                    </th>

                    <th>
                        Score
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($attempts->take(10) as $attempt)

                    <tr>

                        <td>
                            {{ $attempt->quiz->title ?? 'Not Available' }}
                        </td>

                        <td>
                            {{ $attempt->quiz->course->title ?? 'Not Available' }}
                        </td>

                        <td>

                            <span class="percentage">
                                {{ $attempt->percentage }}%
                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="3"
                            class="empty"
                        >
                            No quiz attempts found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =====================================================
         FINAL SUMMARY
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Performance Summary
        </div>


        <div class="highlight">

            The student is currently enrolled in
            <strong>{{ $totalCourses }}</strong>
            course(s), with
            <strong>{{ $completedLessons }}</strong>
            completed lesson(s) out of
            <strong>{{ $totalLessons }}</strong>.

            The overall learning progress is
            <strong>{{ $completionPercentage }}%</strong>.

            The student has completed
            <strong>{{ $totalAttempts }}</strong>
            quiz attempt(s), with an average score of
            <strong>{{ $averageScore }}%</strong>.

            The recorded attendance rate is
            <strong>{{ $attendancePercentage }}%</strong>.

        </div>

    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="footer">

        Generated from
        <span class="footer-brand">
            Learnix Educational Platform
        </span>

    </div>


</body>

</html>
