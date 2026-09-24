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


    {{-- Google Font --}}

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    {{-- Bootstrap --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">


    {{-- Font Awesome --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    {{-- Main CSS --}}

    <link
        rel="stylesheet"
        href="{{ asset('css/custom-design.css') }}">


    @stack('styles')


    <style>

        /* =====================================================
           TEACHER LAYOUT
        ===================================================== */

        * {
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
        }


        body {

            margin: 0;

            background:
                #f7f5fb;

            overflow-x: hidden;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .teacher-sidebar {

            width: 285px;

            height: 100vh;

            position: fixed;

            top: 0;

            right: 0;

            z-index: 1000;

            display: flex;

            flex-direction: column;

            padding: 22px 16px;

            background:
                linear-gradient(
                    180deg,
                    #ffffff 0%,
                    #fbf9ff 100%
                );

            border-left:
                1px solid #eee8f7;

            box-shadow:
                -8px 0 30px rgba(62, 35, 95, .07);

            overflow-y: auto;

            scrollbar-width: thin;

            scrollbar-color:
                #d8c9ee
                transparent;
        }


        .teacher-sidebar::-webkit-scrollbar {
            width: 5px;
        }


        .teacher-sidebar::-webkit-scrollbar-thumb {

            background:
                #d8c9ee;

            border-radius:
                10px;
        }


        .teacher-sidebar::-webkit-scrollbar-track {

            background:
                transparent;
        }



        /* =====================================================
           LOGO
        ===================================================== */

        .teacher-sidebar-logo {

            padding:
                10px 10px 20px;

            margin-bottom:
                15px;

            display:
                flex;

            align-items:
                center;

            gap:
                13px;

            border-bottom:
                1px solid #eeeaf3;
        }


        .teacher-logo-icon {

            width:
                52px;

            height:
                52px;

            flex-shrink:
                0;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                white;

            background:
                linear-gradient(
                    135deg,
                    #6d28d9,
                    #8b5cf6
                );

            border-radius:
                17px;

            font-size:
                22px;

            box-shadow:
                0 8px 20px
                rgba(109,40,217,.20);
        }


        .teacher-logo-text h3 {

            margin:
                0;

            color:
                #302638;

            font-size:
                21px;

            font-weight:
                800;

            letter-spacing:
                -.5px;
        }


        .teacher-logo-text h3 span {

            color:
                #8b5cf6;
        }


        .teacher-logo-text small {

            display:
                block;

            margin-top:
                2px;

            color:
                #9a91a4;

            font-size:
                9px;

            font-weight:
                600;
        }



        /* =====================================================
           USER CARD
        ===================================================== */

        .teacher-sidebar-user {

            padding:
                14px;

            margin-bottom:
                22px;

            display:
                flex;

            align-items:
                center;

            gap:
                11px;

            background:
                linear-gradient(
                    135deg,
                    #f5efff,
                    #fcfbff
                );

            border:
                1px solid #e9def7;

            border-radius:
                17px;
        }


        .teacher-user-avatar {

            width:
                45px;

            height:
                45px;

            flex-shrink:
                0;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                white;

            background:
                linear-gradient(
                    135deg,
                    #7c3aed,
                    #a78bfa
                );

            border-radius:
                14px;

            font-size:
                17px;

            font-weight:
                800;
        }


        .teacher-user-info {

            min-width:
                0;
        }


        .teacher-user-info strong {

            display:
                block;

            overflow:
                hidden;

            color:
                #352d3d;

            font-size:
                12px;

            font-weight:
                800;

            text-overflow:
                ellipsis;

            white-space:
                nowrap;
        }


        .teacher-user-info small {

            display:
                flex;

            align-items:
                center;

            gap:
                5px;

            margin-top:
                3px;

            color:
                #8b5cf6;

            font-size:
                9px;

            font-weight:
                700;
        }


        .teacher-user-info small::before {

            content:
                "";

            width:
                6px;

            height:
                6px;

            background:
                #22c55e;

            border-radius:
                50%;
        }



        /* =====================================================
           NAV TITLE
        ===================================================== */

        .teacher-nav-title {

            padding:
                0 12px 9px;

            color:
                #aaa2b0;

            font-size:
                9px;

            font-weight:
                800;

            letter-spacing:
                .3px;
        }



        /* =====================================================
           NAVIGATION
        ===================================================== */

        .teacher-nav {

            display:
                flex;

            flex-direction:
                column;

            gap:
                5px;
        }


        .teacher-nav-link {

            min-height:
                49px;

            padding:
                0 14px;

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            color:
                #6f6677;

            border-radius:
                14px;

            text-decoration:
                none;

            font-size:
                11px;

            font-weight:
                700;

            transition:
                background .25s ease,
                color .25s ease,
                transform .25s ease;
        }


        .teacher-nav-link:hover {

            color:
                #6d28d9;

            background:
                #f4effc;

            transform:
                translateX(-2px);
        }


        .teacher-nav-link.active {

            color:
                #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #6d28d9,
                    #8b5cf6
                );

            box-shadow:
                0 8px 20px
                rgba(109,40,217,.18);
        }


        .teacher-nav-icon {

            width:
                35px;

            height:
                35px;

            flex-shrink:
                0;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                #8b5cf6;

            background:
                #f2ecfb;

            border-radius:
                11px;

            font-size:
                14px;
        }


        .teacher-nav-link.active
        .teacher-nav-icon {

            color:
                #ffffff;

            background:
                rgba(255,255,255,.18);
        }



        /* =====================================================
           LANGUAGE BUTTON
        ===================================================== */

        .teacher-language-toggle {

            width:
                100%;

            min-height:
                47px;

            margin-bottom:
                8px;

            padding:
                0 14px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                9px;

            color:
                #6d28d9;

            background:
                #f4effc;

            border:
                1px solid #e8dcf7;

            border-radius:
                13px;

            text-decoration:
                none;

            font-size:
                11px;

            font-weight:
                800;

            transition:
                .25s;
        }


        .teacher-language-toggle:hover {

            color:
                white;

            background:
                linear-gradient(
                    135deg,
                    #6d28d9,
                    #8b5cf6
                );

            transform:
                translateY(-2px);
        }


        .teacher-language-toggle i {

            font-size:
                13px;
        }



        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .teacher-sidebar-bottom {

            margin-top:
                auto;

            padding-top:
                18px;

            border-top:
                1px solid #eeeaf3;
        }


        .teacher-profile-link {

            margin-bottom:
                7px;
        }


        .teacher-logout-form {

            margin-top:
                8px;
        }


        .teacher-logout-btn {

            width:
                100%;

            min-height:
                47px;

            border:
                0;

            border-radius:
                13px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                9px;

            color:
                #dc2626;

            background:
                #fff1f2;

            font-family:
                'Cairo', sans-serif;

            font-size:
                11px;

            font-weight:
                800;

            cursor:
                pointer;

            transition:
                .25s;
        }


        .teacher-logout-btn:hover {

            color:
                #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 18px
                rgba(220,38,38,.16);
        }



        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .teacher-main-content {

            min-height:
                100vh;

            margin-right:
                285px;

            padding:
                30px;
        }


        .teacher-page-container {

            width:
                100%;

            max-width:
                1450px;

            margin:
                0 auto;
        }



        /* =====================================================
           TOP BAR
        ===================================================== */

        .teacher-topbar {

            min-height:
                68px;

            margin-bottom:
                25px;

            padding:
                12px 20px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            background:
                #ffffff;

            border:
                1px solid #eee9f5;

            border-radius:
                19px;

            box-shadow:
                0 7px 22px
                rgba(38,23,58,.045);
        }


        .teacher-topbar-title {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;
        }


        .teacher-topbar-icon {

            width:
                38px;

            height:
                38px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                #7c3aed;

            background:
                #f1eaff;

            border-radius:
                11px;
        }


        .teacher-topbar-title h5 {

            margin:
                0;

            color:
                #3b3242;

            font-size:
                14px;

            font-weight:
                800;
        }


        .teacher-topbar-user {

            display:
                flex;

            align-items:
                center;

            gap:
                9px;
        }


        .teacher-topbar-avatar {

            width:
                39px;

            height:
                39px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                white;

            background:
                linear-gradient(
                    135deg,
                    #7c3aed,
                    #a78bfa
                );

            border-radius:
                12px;

            font-size:
                13px;

            font-weight:
                800;
        }


        .teacher-topbar-user span {

            color:
                #6e6576;

            font-size:
                10px;

            font-weight:
                700;
        }



        /* =====================================================
           LTR
        ===================================================== */

        html[dir="ltr"] .teacher-sidebar {

            right:
                auto;

            left:
                0;

            border-left:
                0;

            border-right:
                1px solid #eee8f7;

            box-shadow:
                8px 0 30px
                rgba(62, 35, 95, .07);
        }


        html[dir="ltr"] .teacher-main-content {

            margin-right:
                0;

            margin-left:
                285px;
        }


        html[dir="ltr"] .teacher-nav-link:hover {

            transform:
                translateX(2px);
        }


        html[dir="ltr"] .teacher-language-toggle {

            direction:
                ltr;
        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .teacher-sidebar {

                width:
                    230px;
            }


            .teacher-main-content {

                margin-right:
                    230px;

                padding:
                    20px;
            }


            html[dir="ltr"] .teacher-main-content {

                margin-right:
                    0;

                margin-left:
                    230px;
            }


            .teacher-logo-text {

                display:
                    none;
            }


            .teacher-sidebar-logo {

                justify-content:
                    center;
            }


            .teacher-sidebar-user {

                justify-content:
                    center;
            }


            .teacher-user-info {

                display:
                    none;
            }


            .teacher-nav-link span:not(.teacher-nav-icon) {

                display:
                    none;
            }


            .teacher-nav-link {

                justify-content:
                    center;

                padding:
                    0;
            }


            .teacher-nav-title {

                text-align:
                    center;
            }

        }



        @media (max-width: 650px) {

            .teacher-sidebar {

                width:
                    75px;

                padding:
                    15px 10px;
            }


            .teacher-main-content {

                margin-right:
                    75px;

                padding:
                    12px;
            }


            html[dir="ltr"] .teacher-main-content {

                margin-right:
                    0;

                margin-left:
                    75px;
            }


            .teacher-sidebar-user {

                padding:
                    7px;
            }


            .teacher-sidebar-bottom
            .teacher-nav-title {

                display:
                    none;
            }


            .teacher-logout-btn span {

                display:
                    none;
            }


            .teacher-language-toggle span {

                display:
                    none;
            }


            .teacher-topbar-user span {

                display:
                    none;
            }

        }

    </style>

</head>


<body id="teacherBody">


{{-- =====================================================
     SIDEBAR
===================================================== --}}

<aside class="teacher-sidebar">


    {{-- LOGO --}}

    <div class="teacher-sidebar-logo">

        <div class="teacher-logo-icon">

            <i class="fas fa-graduation-cap"></i>

        </div>

        <div class="teacher-logo-text">

            <h3>
                Learn<span>ix</span>
            </h3>

            <small>
                {{ __('messages.smart_learning_platform') }}
            </small>

        </div>

    </div>



    {{-- USER --}}

    <div class="teacher-sidebar-user">

        <div class="teacher-user-avatar">

            {{ mb_substr(
                auth()->user()->name,
                0,
                1
            ) }}

        </div>

        <div class="teacher-user-info">

            <strong>
                {{ auth()->user()->name }}
            </strong>

            <small>
                {{ __('messages.teacher') }}
            </small>

        </div>

    </div>



    {{-- NAVIGATION --}}

    <div class="teacher-nav-title">

        {{ __('messages.main_menu') }}

    </div>


    <nav class="teacher-nav">


        <a
            href="{{ route('teacher.dashboard') }}"
            class="teacher-nav-link
            {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">

            <span class="teacher-nav-icon">

                <i class="fas fa-house"></i>

            </span>

            <span>
                {{ __('messages.home') }}
            </span>

        </a>



        <a
            href="{{ route('teacher.courses.index') }}"
            class="teacher-nav-link
            {{ request()->routeIs('teacher.courses.index') ? 'active' : '' }}">

            <span class="teacher-nav-icon">

                <i class="fas fa-book-open"></i>

            </span>

            <span>
                {{ __('messages.my_courses') }}
            </span>

        </a>



        <a
            href="{{ route('teacher.courses.create') }}"
            class="teacher-nav-link
            {{ request()->routeIs('teacher.courses.create') ? 'active' : '' }}">

            <span class="teacher-nav-icon">

                <i class="fas fa-plus-circle"></i>

            </span>

            <span>
                {{ __('messages.create_course') }}
            </span>

        </a>



        <a
            href="/teacher/reports"
            class="teacher-nav-link
            {{ request()->is('teacher/reports*') ? 'active' : '' }}">

            <span class="teacher-nav-icon">

                <i class="fas fa-chart-pie"></i>

            </span>

            <span>
                {{ __('messages.statistics_reports') }}
            </span>

        </a>


    </nav>



    {{-- BOTTOM --}}

    <div class="teacher-sidebar-bottom">





        <div class="teacher-nav-title">

            {{ __('messages.account') }}

        </div>


        <a
            href="/profile"
            class="teacher-nav-link teacher-profile-link
            {{ request()->is('profile*') ? 'active' : '' }}">

            <span class="teacher-nav-icon">

                <i class="fas fa-user"></i>

            </span>

            <span>
                {{ __('messages.profile') }}
            </span>

        </a>


        {{-- LANGUAGE --}}
     <a
            href="{{ route(
                'language.switch',
                app()->getLocale() === 'ar' ? 'en' : 'ar'
            ) }}"
            class="teacher-language-toggle"
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

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="teacher-logout-form">

            @csrf

            <button
                type="submit"
                class="teacher-logout-btn">

                <i class="fas fa-right-from-bracket"></i>

                <span>
                    {{ __('messages.logout') }}
                </span>

            </button>

        </form>

    </div>

</aside>



{{-- =====================================================
     MAIN
===================================================== --}}

<main class="teacher-main-content">


    <div class="teacher-page-container">


        {{-- TOPBAR --}}

     <div class="teacher-topbar">

    <div class="teacher-topbar-title">

        <div class="teacher-topbar-icon">

            <i class="fas fa-chalkboard-user"></i>

        </div>

        <h5>
            @yield('title', __('messages.dashboard'))
        </h5>

    </div>


    <div class="teacher-topbar-actions">

        {{-- Theme Toggle --}}

        <button
            type="button"
            id="teacherThemeToggle"
            class="teacher-theme-toggle"
            aria-label="{{ __('messages.theme_toggle') }}">

            <i class="fas fa-moon"></i>

        </button>


        {{-- User --}}

        <div class="teacher-topbar-user">

            <div class="teacher-topbar-avatar">

                {{ mb_substr(
                    auth()->user()->name,
                    0,
                    1
                ) }}

            </div>

            <span>

                {{ auth()->user()->name }}

            </span>

        </div>

    </div>

</div>


        {{-- PAGE CONTENT --}}

        @yield('content')


    </div>

</main>


{{-- Chart.js --}}

<script
    src="https://cdn.jsdelivr.net/npm/chart.js">
</script>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const body =
            document.getElementById('teacherBody');

        const themeToggle =
            document.getElementById(
                'teacherThemeToggle'
            );


        if (!body || !themeToggle) {

            return;
        }


        const savedTheme =
            localStorage.getItem(
                'learnix-theme'
            );


        /* Restore saved theme */

        if (savedTheme === 'dark') {

            body.classList.add(
                'dark-mode'
            );

            themeToggle.innerHTML =
                '<i class="fas fa-sun"></i>';

        }


        /* Toggle */

        themeToggle.addEventListener(
            'click',
            function () {

                body.classList.toggle(
                    'dark-mode'
                );


                const isDark =
                    body.classList.contains(
                        'dark-mode'
                    );


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

    }
);

</script>


@stack('scripts')


</body>

</html>
