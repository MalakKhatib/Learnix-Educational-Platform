<!DOCTYPE html>
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', __('messages.dashboard'))
    </title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Cairo -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    <!-- Main Custom Design -->

    <link
        rel="stylesheet"
        href="{{ asset('css/custom-design.css') }}">


    @stack('styles')

</head>


<body id="appBody">


<div class="app-wrapper">


    <!-- =================================================
         SIDEBAR
    ================================================== -->

    <aside class="sidebar">


        <!-- Brand -->

        <div class="sidebar-logo">


            <div class="logo-icon">

                <i class="fas fa-graduation-cap"></i>

            </div>


            <div class="logo-text">

                <h4>
                    Learn<span>ix</span>
                </h4>

                <small>
                    {{ __('messages.smart_learning_platform') }}
                </small>

            </div>


        </div>



        <!-- User -->

        <div class="topbar-actions">




            <!-- User -->

            <div class="topbar-user">


                <div class="topbar-avatar">

                    {{ mb_substr(
                        auth()->user()->name,
                        0,
                        1
                    ) }}

                </div>


                <div class="topbar-user-info">

                    <strong>

                        {{ auth()->user()->name }}

                    </strong>


                    <small>

                        {{ __('messages.student') }}

                    </small>

                </div>


            </div>


        </div>



        <!-- Navigation Title -->

        <div class="sidebar-title">

            {{ __('messages.main_menu') }}

        </div>



        <!-- Navigation -->

        <nav class="sidebar-nav">


            <!-- Dashboard -->

            <a
                href="/student/dashboard"
                class="sidebar-link
                {{ request()->is('student/dashboard') ? 'active' : '' }}">

                <span class="sidebar-icon">

                    <i class="fas fa-house"></i>

                </span>


                <span>

                    {{ __('messages.dashboard') }}

                </span>

            </a>



            <!-- Courses -->

            <a
                href="/courses"
                class="sidebar-link
                {{ request()->is('courses') ? 'active' : '' }}">

                <span class="sidebar-icon">

                    <i class="fas fa-book-open"></i>

                </span>


                <span>

                    {{ __('messages.all_courses') }}

                </span>

            </a>



            <!-- My Courses -->

            <a
                href="/my-courses"
                class="sidebar-link
                {{ request()->is('my-courses*') ? 'active' : '' }}">

                <span class="sidebar-icon">

                    <i class="fas fa-graduation-cap"></i>

                </span>


                <span>

                    {{ __('messages.my_courses') }}

                </span>

            </a>



            <!-- Results -->

            <a
                href="/student/results"
                class="sidebar-link
                {{ request()->is('student/results*') ? 'active' : '' }}">

                <span class="sidebar-icon">

                    <i class="fas fa-chart-line"></i>

                </span>


                <span>

                    {{ __('messages.results') }}

                </span>

            </a>



            <!-- Reports -->

            <a
                href="/student/reports"
                class="sidebar-link
                {{ request()->is('student/reports*') ? 'active' : '' }}">

                <span class="sidebar-icon">

                    <i class="fas fa-chart-pie"></i>

                </span>


                <span>

                    {{ __('messages.statistics_reports') }}

                </span>

            </a>


        </nav>



        <!-- Sidebar Bottom -->

        <div class="sidebar-bottom">



            <div class="sidebar-title">

                {{ __('messages.account') }}

            </div>


            <!-- Profile -->

            <a
                href="/profile"
                class="sidebar-link
                {{ request()->is('profile*') ? 'active' : '' }}">

                <span class="sidebar-icon">

                    <i class="fas fa-user"></i>

                </span>


                <span>

                    {{ __('messages.profile') }}

                </span>

            </a>



            <!-- Language -->

            <a
                href="{{ route(
                    'language.switch',
                    app()->getLocale() === 'ar' ? 'en' : 'ar'
                ) }}"
                class="student-language-toggle"
                title="{{ app()->getLocale() === 'ar'
                    ? __('messages.english')
                    : __('messages.arabic') }}">

                <i class="fas fa-globe"></i>

                <span>
                    {{ app()->getLocale() === 'ar'
                        ? __('messages.english')
                        : __('messages.arabic') }}
                </span>

            </a>


            <!-- Logout -->

            <form
                method="POST"
                action="/logout">

                @csrf


                <button
                    type="submit"
                    class="logout-btn">


                    <span class="sidebar-icon">

                        <i class="fas fa-right-from-bracket"></i>

                    </span>


                    <span>

                        {{ __('messages.logout') }}

                    </span>


                </button>


            </form>


        </div>


    </aside>



    <!-- =================================================
         MAIN CONTENT
    ================================================== -->

    <main class="main-content">


        <!-- Topbar -->

        <header class="topbar">


            <div class="topbar-title">


                <div class="topbar-small">

                    Learnix

                </div>


                <h5>

                    @yield(
                        'title',
                        __('messages.dashboard')
                    )

                </h5>


                <span>

                    {{ __('messages.welcome_learning_journey') }}

                </span>


            </div>



            <!-- User -->

            <div class="topbar-user">

<!-- Theme Toggle -->

            <button
                type="button"
                id="themeToggle"
                class="theme-toggle"
                aria-label="{{ __('messages.theme_toggle') }}">

                <i class="fas fa-moon"></i>

            </button>


                <div class="topbar-avatar">

                    {{ mb_substr(
                        auth()->user()->name,
                        0,
                        1
                    ) }}

                </div>


                <div class="topbar-user-info">

                    <strong>

                        {{ auth()->user()->name }}

                    </strong>


                    <small>

                        {{ __('messages.student') }}

                    </small>

                </div>


            </div>


        </header>



        <!-- Page Content -->

        <section class="page-content">

            @yield('content')

        </section>


    </main>


</div>



<!-- Chart.js -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const body =
        document.getElementById('appBody');

    const themeToggle =
        document.getElementById('themeToggle');


    if (!body || !themeToggle) {
        return;
    }


    const savedTheme =
        localStorage.getItem('learnix-theme');


    /* Restore saved theme */

    if (savedTheme === 'dark') {

        body.classList.add('dark-mode');

        themeToggle.innerHTML =
            '<i class="fas fa-sun"></i>';

    }


    /* Toggle theme */

    themeToggle.addEventListener(
        'click',
        function () {

            body.classList.toggle('dark-mode');


            const isDark =
                body.classList.contains('dark-mode');


            if (isDark) {

                localStorage.setItem(
                    'learnix-theme',
                    'dark'
                );

                themeToggle.innerHTML =
                    '<i class="fas fa-sun"></i>';

            } else {

                localStorage.setItem(
                    'learnix-theme',
                    'light'
                );

                themeToggle.innerHTML =
                    '<i class="fas fa-moon"></i>';

            }

        }
    );

});

</script>


@stack('scripts')


<style>

/* =====================================================
   STUDENT LANGUAGE BUTTON
===================================================== */

.student-language-toggle {

    width: 100%;

    min-height: 47px;

    margin-bottom: 8px;

    padding: 0 14px;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    color: #6d28d9;

    background: #f4effc;

    border: 1px solid #e8dcf7;

    border-radius: 13px;

    text-decoration: none;

    font-size: 11px;

    font-weight: 800;

    transition: .25s;
}


.student-language-toggle:hover {

    color: white;

    background:
        linear-gradient(
            135deg,
            #6d28d9,
            #8b5cf6
        );

    transform:
        translateY(-2px);
}


.student-language-toggle i {

    font-size: 13px;
}



/* =====================================================
   LTR SIDEBAR
===================================================== */

html[dir="ltr"] .sidebar {

    right: auto;

    left: 0;
}


html[dir="ltr"] .main-content {

    margin-right: 0;

    margin-left: 285px;
}


html[dir="ltr"] .sidebar-link:hover {

    transform:
        translateX(2px);
}


html[dir="ltr"] .student-language-toggle {

    direction: ltr;
}



/* =====================================================
   RESPONSIVE LTR
===================================================== */

@media (max-width: 900px) {

    html[dir="ltr"] .main-content {

        margin-right: 0;

        margin-left: 230px;
    }

}


@media (max-width: 650px) {

    html[dir="ltr"] .main-content {

        margin-right: 0;

        margin-left: 75px;
    }


    .student-language-toggle span {

        display: none;
    }

}

</style>


</body>

</html>
