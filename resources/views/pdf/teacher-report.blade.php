<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">

    <title>Teacher Activity Report</title>

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

        .role-badge {
            display: inline-block;
            background: #f0e8ff;
            color: #6d28d9;
            padding: 5px 10px;
            border-radius: 7px;
            font-size: 10px;
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
            padding: 15px 7px;
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
            padding: 10px 8px;
            border: 1px solid #e7e1f0;
            text-align: center;
            color: #4f4857;
        }

        .data-table tr:nth-child(even) td {
            background: #fbfafc;
        }

        .course-name {
            color: #4c1d95;
            font-weight: bold;
        }

        .number-value {
            font-weight: bold;
            color: #6d28d9;
        }

        .empty {
            text-align: center !important;
            color: #99939f !important;
            padding: 17px !important;
        }

        .highlight {
            background: #f8f5fc;
            border-left: 4px solid #6d28d9;
            padding: 14px 16px;
            border-radius: 8px;
            margin-top: 12px;
            line-height: 1.8;
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
            Teacher Activity Report
        </h1>

        <div class="subtitle">
            Teaching activity, courses, lessons, students and assessments
        </div>

    </div>


    {{-- =====================================================
         TEACHER INFORMATION
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Teacher Information
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

                    <span class="role-badge">
                        Teacher
                    </span>

                </td>

            </tr>


            <tr>

                <td class="info-label">
                    Report Type
                </td>

                <td class="info-value">
                    Teaching Activity Report
                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         TEACHING OVERVIEW
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Teaching Overview
        </div>


        <table class="summary-table">

            <tr>

                <td class="summary-card">

                    <span class="summary-number">
                        {{ $totalCourses }}
                    </span>

                    <span class="summary-label">
                        Courses Created
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
                        {{ $totalStudents }}
                    </span>

                    <span class="summary-label">
                        Enrolled Students
                    </span>

                </td>


                <td class="summary-card">

                    <span class="summary-number">
                        {{ $totalQuizzes }}
                    </span>

                    <span class="summary-label">
                        Total Quizzes
                    </span>

                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         CREATED COURSES
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Courses Created by Teacher
        </div>


        <table class="data-table">

            <thead>

                <tr>

                    <th>
                        Course
                    </th>

                    <th>
                        Lessons
                    </th>

                    <th>
                        Enrolled Students
                    </th>

                    <th>
                        Quizzes
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($courses as $course)

                    <tr>

                        <td class="course-name">
                            {{ $course->title }}
                        </td>

                        <td class="number-value">
                            {{ $course->lessons->count() }}
                        </td>

                        <td class="number-value">
                            {{ $course->students->count() }}
                        </td>

                        <td class="number-value">
                            {{ $course->quizzes->count() }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="empty"
                        >
                            No courses have been created by this teacher yet.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =====================================================
         ACTIVITY SUMMARY
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Teaching Activity Summary
        </div>


        <div class="highlight">

            This report contains the current teaching activity
            recorded for

            <strong>{{ $user->name }}</strong>.

            The teacher has created

            <strong>{{ $totalCourses }}</strong>
            course(s),

            containing

            <strong>{{ $totalLessons }}</strong>
            lesson(s),

            serving

            <strong>{{ $totalStudents }}</strong>
            unique enrolled student(s),

            with

            <strong>{{ $totalQuizzes }}</strong>
            quiz(es).

            <br>

            All figures are calculated from the current data
            stored in the Learnix platform database.

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
