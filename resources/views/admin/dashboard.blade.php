@extends('admin.layouts.app')

@section('title', 'لوحة الأدمن')

@section('content')

<div class="admin-dashboard-page">


    {{-- =====================================================
         WELCOME
    ====================================================== --}}

    <div class="admin-welcome-card">

        <div class="admin-welcome-content">

            <div class="admin-welcome-icon">

                <i class="fas fa-user-shield"></i>

            </div>

            <div>

                <div class="admin-small-label">

                    <i class="fas fa-sparkles"></i>

                    لوحة الإدارة

                </div>

                <h2>
                    أهلاً {{ auth()->user()->name }} 
                </h2>

                <p>
                    من هنا يمكنك إدارة جميع عناصر منصة Learnix
                    ومتابعة نشاط المنصة.
                </p>

            </div>

        </div>


        <div class="admin-welcome-badge">

            <i class="fas fa-shield-halved"></i>

            مدير النظام

        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="admin-statistics-grid">


        {{-- Teachers --}}

        <div class="admin-stat-card purple">

            <div class="admin-stat-icon">

                <i class="fas fa-chalkboard-user"></i>

            </div>

            <div class="admin-stat-info">

                <span>
                    المعلمون
                </span>

                <strong>
                    {{ $totalTeachers ?? 0 }}
                </strong>

                <small>
                    إجمالي المعلمين
                </small>

            </div>

        </div>



        {{-- Students --}}

        <div class="admin-stat-card blue">

            <div class="admin-stat-icon">

                <i class="fas fa-user-graduate"></i>

            </div>

            <div class="admin-stat-info">

                <span>
                    الطلاب
                </span>

                <strong>
                    {{ $totalStudents ?? 0 }}
                </strong>

                <small>
                    إجمالي الطلاب
                </small>

            </div>

        </div>



        {{-- Courses --}}

        <div class="admin-stat-card green">

            <div class="admin-stat-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div class="admin-stat-info">

                <span>
                    الكورسات
                </span>

                <strong>
                    {{ $totalCourses ?? 0 }}
                </strong>

                <small>
                    إجمالي الكورسات
                </small>

            </div>

        </div>



        {{-- Lessons --}}

        <div class="admin-stat-card orange">

            <div class="admin-stat-icon">

                <i class="fas fa-book"></i>

            </div>

            <div class="admin-stat-info">

                <span>
                    الدروس
                </span>

                <strong>
                    {{ $totalLessons ?? 0 }}
                </strong>

                <small>
                    إجمالي الدروس
                </small>

            </div>

        </div>



        {{-- Quizzes --}}

        <div class="admin-stat-card red">

            <div class="admin-stat-icon">

                <i class="fas fa-clipboard-question"></i>

            </div>

            <div class="admin-stat-info">

                <span>
                    الاختبارات
                </span>

                <strong>
                    {{ $totalQuizzes ?? 0 }}
                </strong>

                <small>
                    إجمالي الاختبارات
                </small>

            </div>

        </div>


    </div>



    {{-- =====================================================
         QUICK ACTIONS
    ====================================================== --}}

    <div class="admin-section-title">

        <div>

            <div class="admin-section-label">

                <i class="fas fa-bolt"></i>

                اختصارات الإدارة

            </div>

            <h3>
                الوصول السريع
            </h3>

        </div>

    </div>



    <div class="admin-quick-grid">


        <a
            href="/admin/teachers"
            class="admin-quick-card purple">

            <div class="admin-quick-icon">

                <i class="fas fa-chalkboard-user"></i>

            </div>

            <div>

                <strong>
                    إدارة المعلمين
                </strong>

                <span>
                    عرض وإدارة حسابات المعلمين
                </span>

            </div>

            <i class="fas fa-arrow-left admin-quick-arrow"></i>

        </a>



        <a
            href="/admin/students"
            class="admin-quick-card blue">

            <div class="admin-quick-icon">

                <i class="fas fa-user-graduate"></i>

            </div>

            <div>

                <strong>
                    إدارة الطلاب
                </strong>

                <span>
                    عرض وإدارة حسابات الطلاب
                </span>

            </div>

            <i class="fas fa-arrow-left admin-quick-arrow"></i>

        </a>



        <a
            href="/admin/courses"
            class="admin-quick-card green">

            <div class="admin-quick-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <strong>
                    إدارة الكورسات
                </strong>

                <span>
                    متابعة وإدارة كورسات المنصة
                </span>

            </div>

            <i class="fas fa-arrow-left admin-quick-arrow"></i>

        </a>



        <a
            href="/admin/reports"
            class="admin-quick-card orange">

            <div class="admin-quick-icon">

                <i class="fas fa-chart-pie"></i>

            </div>

            <div>

                <strong>
                    الإحصائيات والتقارير
                </strong>

                <span>
                    تحليل بيانات المنصة
                </span>

            </div>

            <i class="fas fa-arrow-left admin-quick-arrow"></i>

        </a>


    </div>



    {{-- =====================================================
         PLATFORM OVERVIEW
    ====================================================== --}}

    <div class="admin-overview-card">

        <div class="admin-overview-header">

            <div>

                <div class="admin-section-label">

                    <i class="fas fa-chart-line"></i>

                    نظرة عامة

                </div>

                <h3>
                    ملخص المنصة
                </h3>

                <p>
                    ملخص سريع عن المحتوى والمستخدمين الموجودين في المنصة.
                </p>

            </div>


            <div class="admin-overview-icon">

                <i class="fas fa-chart-column"></i>

            </div>

        </div>


        <div class="admin-overview-grid">


            <div class="admin-overview-item">

                <div class="admin-overview-item-icon purple">

                    <i class="fas fa-users"></i>

                </div>

                <div>

                    <span>
                        المستخدمون
                    </span>

                    <strong>

                        {{ ($totalTeachers ?? 0)
                            + ($totalStudents ?? 0) }}

                    </strong>

                </div>

            </div>



            <div class="admin-overview-item">

                <div class="admin-overview-item-icon green">

                    <i class="fas fa-layer-group"></i>

                </div>

                <div>

                    <span>
                        المحتوى التعليمي
                    </span>

                    <strong>

                        {{ ($totalCourses ?? 0)
                            + ($totalLessons ?? 0)
                            + ($totalQuizzes ?? 0) }}

                    </strong>

                </div>

            </div>


        </div>

    </div>


</div>

@endsection
