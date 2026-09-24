<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            width: 280px;
            height: 100vh;
            background: white;
            position: fixed;
            top: 0;
            right: 0;
            box-shadow: -5px 0 25px rgba(0,0,0,.08);
            padding: 25px;
            z-index: 1000;
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo i {
            font-size: 50px;
            color: #2563eb;
            margin-bottom: 10px;
        }

        .logo h3 {
            font-weight: bold;
            color: #1e293b;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: #334155;
            background: #f8fafc;
            padding: 16px;
            border-radius: 16px;
            margin-bottom: 15px;
            transition: .3s;
            font-weight: 600;
        }

        .menu-item:hover {
            background: #2563eb;
            color: white;
            transform: translateX(-5px);
        }

        .menu-item i {
            font-size: 20px;
            width: 30px;
        }

        .main-content {
            margin-right: 280px;
            padding: 35px;
        }

        .topbar {
            background: white;
            border-radius: 22px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-card {
            background: white;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        .logout-btn {
            border: none;
            background: #ef4444;
            color: white;
            padding: 10px 18px;
            border-radius: 12px;
        }

        .logout-btn:hover {
            background: #dc2626;
        }
        .active-menu {
    background: #2563eb !important;
    color: white !important;
    box-shadow: 0 10px 25px rgba(37,99,235,.25);
}

.active-menu i {
    color: white !important;
}
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="logo">
            <i class="fas fa-user-shield"></i>
            <h3>لوحة الأدمن</h3>
        </div>

        <a href="/admin/dashboard"
class="menu-item {{ request()->is('admin/dashboard') ? 'active-menu' : '' }}">

    <i class="fas fa-home"></i>
    الرئيسية
</a>

        <a href="/admin/teachers"
class="menu-item {{ request()->is('admin/teachers*') ? 'active-menu' : '' }}">

    <i class="fas fa-chalkboard-teacher"></i>
    المعلمين
</a>

       <a href="/admin/students"
class="menu-item {{ request()->is('admin/students*') ? 'active-menu' : '' }}">

    <i class="fas fa-users"></i>
    الطلاب
</a>

        <a href="/admin/courses"
class="menu-item {{ request()->is('admin/courses*') ? 'active-menu' : '' }}">

    <i class="fas fa-book"></i>
    الكورسات
</a>

        <a href="#"
class="menu-item {{ request()->is('admin/reports*') ? 'active-menu' : '' }}">

    <i class="fas fa-chart-line"></i>
    التقارير
</a>

    </div>

    <!-- Main Content -->
    <div class="main-content">

        <div class="topbar">

            <div>
                <h4 class="mb-0">
                    @yield('page-title')
                </h4>
            </div>

            <div class="d-flex align-items-center gap-3">

                <span>
                    أهلاً {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}"
                    method="POST">

                    @csrf
                    <button class="logout-btn">
                        تسجيل خروج
                    </button>
                </form>

            </div>
        </div>

        <div class="content-card">
            @yield('content')
        </div>

    </div>

</body>

</html>