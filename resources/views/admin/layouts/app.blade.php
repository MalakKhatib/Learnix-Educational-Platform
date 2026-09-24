<!DOCTYPE html>
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Learnix')
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
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    {{-- Font Awesome --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    {{-- Main CSS --}}

    <link
        rel="stylesheet"
        href="{{ asset('css/custom-design.css') }}">


    @stack('styles')


    <style>

        /* =====================================================
           ADMIN LAYOUT
        ===================================================== */

        * {
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: #f7f5fb;
            overflow-x: hidden;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .admin-sidebar {

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
                -8px 0 30px
                rgba(62, 35, 95, .07);

            overflow-y: auto;

            scrollbar-width: thin;

            scrollbar-color:
                #d8c9ee
                transparent;
        }


        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }


        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #d8c9ee;
            border-radius: 10px;
        }


        .admin-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }



        /* =====================================================
           LOGO
        ===================================================== */

        .admin-sidebar-logo {

            padding:
                10px 10px 20px;

            margin-bottom: 15px;

            display: flex;

            align-items: center;

            gap: 13px;

            border-bottom:
                1px solid #eeeaf3;
        }


        .admin-logo-icon {

            width: 52px;
            height: 52px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #6d28d9,
                    #8b5cf6
                );

            border-radius: 17px;

            font-size: 22px;

            box-shadow:
                0 8px 20px
                rgba(109,40,217,.20);
        }


        .admin-logo-text h3 {

            margin: 0;

            color: #302638;

            font-size: 21px;

            font-weight: 800;
        }


        .admin-logo-text h3 span {

            color: #8b5cf6;
        }


        .admin-logo-text small {

            display: block;

            margin-top: 2px;

            color: #9a91a4;

            font-size: 9px;

            font-weight: 600;
        }



        /* =====================================================
           ADMIN USER
        ===================================================== */

        .admin-sidebar-user {

            padding: 14px;

            margin-bottom: 22px;

            display: flex;

            align-items: center;

            gap: 11px;

            background:
                linear-gradient(
                    135deg,
                    #f5efff,
                    #fcfbff
                );

            border:
                1px solid #e9def7;

            border-radius: 17px;
        }


        .admin-user-avatar {

            width: 45px;
            height: 45px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #7c3aed,
                    #a78bfa
                );

            border-radius: 14px;

            font-size: 17px;

            font-weight: 800;
        }


        .admin-user-info strong {

            display: block;

            color: #352d3d;

            font-size: 12px;

            font-weight: 800;
        }


        .admin-user-info small {

            display: flex;

            align-items: center;

            gap: 5px;

            margin-top: 3px;

            color: #8b5cf6;

            font-size: 9px;

            font-weight: 700;
        }


        .admin-user-info small::before {

            content: "";

            width: 6px;
            height: 6px;

            background: #22c55e;

            border-radius: 50%;
        }



        /* =====================================================
           NAVIGATION TITLE
        ===================================================== */

        .admin-nav-title {

            padding:
                0 12px 9px;

            color: #aaa2b0;

            font-size: 9px;

            font-weight: 800;
        }



        /* =====================================================
           NAVIGATION
        ===================================================== */

        .admin-nav {

            display: flex;

            flex-direction: column;

            gap: 5px;
        }


        .admin-nav-link {

            min-height: 49px;

            padding: 0 14px;

            display: flex;

            align-items: center;

            gap: 12px;

            color: #6f6677;

            border-radius: 14px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            transition: .25s;
        }


        .admin-nav-link:hover {

            color: #6d28d9;

            background: #f4effc;

            transform:
                translateX(-2px);
        }


        .admin-nav-link.active {

            color: white;

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


        .admin-nav-icon {

            width: 35px;
            height: 35px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #8b5cf6;

            background: #f2ecfb;

            border-radius: 11px;

            font-size: 14px;
        }


        .admin-nav-link.active
        .admin-nav-icon {

            color: white;

            background:
                rgba(255,255,255,.18);
        }



        /* =====================================================
           LANGUAGE BUTTON
        ===================================================== */

        .admin-language-toggle {

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


        .admin-language-toggle:hover {

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


        .admin-language-toggle i {

            font-size: 13px;
        }



        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .admin-sidebar-bottom {

            margin-top: auto;

            padding-top: 18px;

            border-top:
                1px solid #eeeaf3;
        }


        .admin-profile-link {

            margin-bottom: 7px;
        }


        .admin-logout-form {

            margin-top: 8px;
        }


        .admin-logout-btn {

            width: 100%;

            min-height: 47px;

            border: 0;

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            color: #dc2626;

            background: #fff1f2;

            font-family: 'Cairo', sans-serif;

            font-size: 11px;

            font-weight: 800;

            cursor: pointer;

            transition: .25s;
        }


        .admin-logout-btn:hover {

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );

            transform:
                translateY(-2px);
        }



        /* =====================================================
           MAIN
        ===================================================== */

        .admin-main-content {

            min-height: 100vh;

            margin-right: 285px;

            padding: 30px;
        }


        .admin-page-container {

            width: 100%;

            max-width: 1450px;

            margin: 0 auto;
        }



        /* =====================================================
           TOPBAR
        ===================================================== */

        .admin-topbar {

            min-height: 68px;

            margin-bottom: 25px;

            padding: 12px 20px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: white;

            border:
                1px solid #eee9f5;

            border-radius: 19px;

            box-shadow:
                0 7px 22px
                rgba(38,23,58,.045);
        }


        .admin-topbar-title {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .admin-topbar-icon {

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #7c3aed;

            background: #f1eaff;

            border-radius: 11px;

            font-size: 14px;
        }


        .admin-topbar-title h5 {

            margin: 0;

            color: #3b3242;

            font-size: 14px;

            font-weight: 800;
        }


        .admin-topbar-actions {

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .admin-theme-toggle {

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 0;

            border-radius: 11px;

            color: #7c3aed;

            background: #f1eaff;

            cursor: pointer;

            transition: .25s;
        }


        .admin-theme-toggle:hover {

            transform:
                translateY(-2px);
        }


        .admin-topbar-user {

            display: flex;

            align-items: center;

            gap: 9px;
        }


        .admin-topbar-avatar {

            width: 39px;
            height: 39px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #7c3aed,
                    #a78bfa
                );

            border-radius: 12px;

            font-size: 13px;

            font-weight: 800;
        }


        .admin-topbar-user span {

            color: #6e6576;

            font-size: 10px;

            font-weight: 700;
        }



        /* =====================================================
           LTR
        ===================================================== */

        html[dir="ltr"] .admin-sidebar {

            right: auto;

            left: 0;

            border-left: 0;

            border-right:
                1px solid #eee8f7;

            box-shadow:
                8px 0 30px
                rgba(62, 35, 95, .07);
        }


        html[dir="ltr"] .admin-main-content {

            margin-right: 0;

            margin-left: 285px;
        }


        html[dir="ltr"] .admin-nav-link:hover {

            transform:
                translateX(2px);
        }


        html[dir="ltr"] .admin-language-toggle {

            direction: ltr;
        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .admin-sidebar {

                width: 230px;
            }


            .admin-main-content {

                margin-right: 230px;

                padding: 20px;
            }


            html[dir="ltr"] .admin-main-content {

                margin-right: 0;

                margin-left: 230px;
            }


            .admin-logo-text {

                display: none;
            }


            .admin-sidebar-logo {

                justify-content: center;
            }


            .admin-sidebar-user {

                justify-content: center;
            }


            .admin-user-info {

                display: none;
            }


            .admin-nav-link {

                justify-content: center;
            }


            .admin-nav-link > span:last-child {

                display: none;
            }

        }



        @media (max-width: 650px) {

            .admin-sidebar {

                width: 75px;

                padding: 15px 10px;
            }


            .admin-main-content {

                margin-right: 75px;

                padding: 12px;
            }


            html[dir="ltr"] .admin-main-content {

                margin-right: 0;

                margin-left: 75px;
            }


            .admin-nav-link {

                padding: 0;
            }


            .admin-nav-title {

                display: none;
            }


            .admin-sidebar-user {

                padding: 7px;
            }


            .admin-logout-btn span {

                display: none;
            }


            .admin-language-toggle span {

                display: none;
            }


            .admin-topbar-user span {

                display: none;
            }

        }

    </style>

</head>


<body id="adminBody">


{{-- =====================================================
     SIDEBAR
===================================================== --}}

<aside class="admin-sidebar">


    {{-- LOGO --}}

    <div class="admin-sidebar-logo">

        <div class="admin-logo-icon">

            <i class="fas fa-user-shield"></i>

        </div>

        <div class="admin-logo-text">

            <h3>
                Learn<span>ix</span>
            </h3>

            <small>
                {{ __('messages.admin_platform_dashboard') }}
            </small>

        </div>

    </div>



    {{-- ADMIN USER --}}

    <div class="admin-sidebar-user">

        <div class="admin-user-avatar">

            {{ mb_substr(
                auth()->user()->name,
                0,
                1
            ) }}

        </div>

        <div class="admin-user-info">

            <strong>
                {{ auth()->user()->name }}
            </strong>

            <small>
                {{ __('messages.admin') }}
            </small>

        </div>

    </div>



    {{-- NAVIGATION --}}

    <div class="admin-nav-title">

        {{ __('messages.main_menu') }}

    </div>


    <nav class="admin-nav">


        <a
            href="/admin/dashboard"
            class="admin-nav-link
            {{ request()->is('admin/dashboard') ? 'active' : '' }}">

            <span class="admin-nav-icon">

                <i class="fas fa-house"></i>

            </span>

            <span>
                {{ __('messages.dashboard') }}
            </span>

        </a>



        <a
            href="/admin/teachers"
            class="admin-nav-link
            {{ request()->is('admin/teachers*') ? 'active' : '' }}">

            <span class="admin-nav-icon">

                <i class="fas fa-chalkboard-user"></i>

            </span>

            <span>
                {{ __('messages.manage_teachers') }}
            </span>

        </a>



        <a
            href="/admin/students"
            class="admin-nav-link
            {{ request()->is('admin/students*') ? 'active' : '' }}">

            <span class="admin-nav-icon">

                <i class="fas fa-user-graduate"></i>

            </span>

            <span>
                {{ __('messages.manage_students') }}
            </span>

        </a>



        <a
            href="/admin/courses"
            class="admin-nav-link
            {{ request()->is('admin/courses*') ? 'active' : '' }}">

            <span class="admin-nav-icon">

                <i class="fas fa-book-open"></i>

            </span>

            <span>
                {{ __('messages.manage_courses') }}
            </span>

        </a>



        <a
            href="/admin/reports"
            class="admin-nav-link
            {{ request()->is('admin/reports*') ? 'active' : '' }}">

            <span class="admin-nav-icon">

                <i class="fas fa-chart-pie"></i>

            </span>

            <span>
                {{ __('messages.statistics') }}
            </span>

        </a>


    </nav>



    {{-- BOTTOM --}}

    <div class="admin-sidebar-bottom">


        <div class="admin-nav-title">
            {{ __('messages.account') }}
        </div>


        <a
            href="/profile"
            class="admin-nav-link admin-profile-link
            {{ request()->is('profile*') ? 'active' : '' }}">

            <span class="admin-nav-icon">

                <i class="fas fa-user"></i>

            </span>

            <span>
                {{ __('messages.profile') }}
            </span>

        </a>


        {{-- Language --}}

        <a
            href="{{ route(
                'language.switch',
                app()->getLocale() === 'ar' ? 'en' : 'ar'
            ) }}"
            class="admin-language-toggle"
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
            action="/logout"
            class="admin-logout-form">

            @csrf

            <button
                type="submit"
                class="admin-logout-btn">

                <i class="fas fa-right-from-bracket"></i>

                <span>
                    {{ __('messages.logout') }}
                </span>

            </button>

        </form>

    </div>


</aside>



{{-- =====================================================
     MAIN CONTENT
===================================================== --}}

<main class="admin-main-content">


    <div class="admin-page-container">


        {{-- TOPBAR --}}

        <div class="admin-topbar">

            <div class="admin-topbar-title">

                <div class="admin-topbar-icon">

                    <i class="fas fa-user-shield"></i>

                </div>

                <h5>

                    @yield('title', __('messages.dashboard'))

                </h5>

            </div>


            <div class="admin-topbar-actions">


                {{-- Theme Toggle --}}

                <button
                    type="button"
                    id="adminThemeToggle"
                    class="admin-theme-toggle"
                    aria-label="{{ __('messages.theme_toggle') }}">

                    <i class="fas fa-moon"></i>

                </button>


                {{-- User --}}

                <div class="admin-topbar-user">

                    <div class="admin-topbar-avatar">

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



        {{-- CONTENT --}}

        @yield('content')


    </div>

</main>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const body =
            document.getElementById('adminBody');

        const themeToggle =
            document.getElementById(
                'adminThemeToggle'
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
