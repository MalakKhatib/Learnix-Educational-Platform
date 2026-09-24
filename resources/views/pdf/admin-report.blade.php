<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">

    <title>Admin Platform Report</title>

    <style>

        @page {
            margin: 35px 40px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            direction: ltr;
            color: #30303b;
            font-size: 12px;
            margin: 0;
            background: #ffffff;
        }

        .header {
            width: 100%;
            background: #6d28d9;
            padding: 25px 28px;
            border-radius: 14px;
            color: #ffffff;
            margin-bottom: 25px;
        }

        .brand {
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            font-size: 11px;
            margin-top: 8px;
            color: #eee7ff;
        }

        .section {
            margin-top: 24px;
        }

        .section-title {
            font-size: 15px;
            font-weight: bold;
            color: #4c1d95;
            margin-bottom: 12px;
            padding-bottom: 7px;
            border-bottom: 2px solid #eee8f8;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #eeeef2;
        }

        .info-label {
            width: 32%;
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

        .statistics {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px;
            margin-left: -8px;
            margin-right: -8px;
        }

        .stat {
            width: 33.33%;
            border: 1px solid #ece8f3;
            background: #faf9fc;
            padding: 17px 10px;
            text-align: center;
            border-radius: 10px;
        }

        .stat-number {
            display: block;
            font-size: 23px;
            font-weight: bold;
            color: #6d28d9;
            margin-bottom: 6px;
        }

        .stat-label {
            display: block;
            font-size: 10px;
            color: #716b78;
            font-weight: bold;
        }

        .summary {
            background: #f8f5fc;
            border-left: 4px solid #6d28d9;
            padding: 16px 18px;
            line-height: 1.8;
            color: #5f5868;
            border-radius: 8px;
        }

        .summary strong {
            color: #4c1d95;
        }

        .footer {
            margin-top: 35px;
            padding-top: 12px;
            border-top: 1px solid #e6e2eb;
            text-align: center;
            color: #918b98;
            font-size: 9px;
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
            Admin Platform Report
        </h1>

        <div class="subtitle">
            Platform overview and administrator information
        </div>

    </div>


    {{-- =====================================================
         ADMIN INFORMATION
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Administrator Information
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
                    Account Role
                </td>

                <td class="info-value">

                    <span class="role-badge">
                        Administrator
                    </span>

                </td>

            </tr>


            <tr>

                <td class="info-label">
                    Report Type
                </td>

                <td class="info-value">
                    Platform Administration Report
                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         PLATFORM STATISTICS
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Platform Statistics
        </div>


        <table class="statistics">

            <tr>

                <td class="stat">

                    <span class="stat-number">
                        {{ $totalStudents }}
                    </span>

                    <span class="stat-label">
                        Registered Students
                    </span>

                </td>


                <td class="stat">

                    <span class="stat-number">
                        {{ $totalTeachers }}
                    </span>

                    <span class="stat-label">
                        Registered Teachers
                    </span>

                </td>


                <td class="stat">

                    <span class="stat-number">
                        {{ $totalAdmins }}
                    </span>

                    <span class="stat-label">
                        Administrators
                    </span>

                </td>

            </tr>


            <tr>

                <td class="stat">

                    <span class="stat-number">
                        {{ $totalCourses }}
                    </span>

                    <span class="stat-label">
                        Educational Courses
                    </span>

                </td>


                <td class="stat">

                    <span class="stat-number">
                        {{ $totalLessons }}
                    </span>

                    <span class="stat-label">
                        Educational Lessons
                    </span>

                </td>


                <td class="stat">

                    <span class="stat-number">
                        {{ $totalQuizzes }}
                    </span>

                    <span class="stat-label">
                        Available Quizzes
                    </span>

                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         PLATFORM SUMMARY
    ====================================================== --}}

    <div class="section">

        <div class="section-title">
            Platform Summary
        </div>


        <div class="summary">

            The Learnix educational platform currently contains

            <strong>{{ $totalStudents }}</strong>
            registered students,

            <strong>{{ $totalTeachers }}</strong>
            registered teachers,

            <strong>{{ $totalCourses }}</strong>
            educational courses,

            <strong>{{ $totalLessons }}</strong>
            educational lessons, and

            <strong>{{ $totalQuizzes }}</strong>
            available quizzes.

            <br>

            This report reflects the current data stored in the
            platform database at the time the report was generated.

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
