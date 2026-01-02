<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Admin Panel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        /* Sidebar Navigation */
        .admin-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #2d3748 0%, #1a202c 100%);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
            z-index: 1000;
        }

        .admin-sidebar .brand {
            padding: 2rem 1.5rem;
            background: rgba(102, 126, 234, 0.1);
            border-bottom: 2px solid #667eea;
        }

        .admin-sidebar .brand h1 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .admin-sidebar .brand h1 i {
            color: #667eea;
            font-size: 1.75rem;
        }

        .admin-sidebar .brand p {
            color: #cbd5e0;
            font-size: 0.875rem;
        }

        .admin-nav {
            padding: 1.5rem 0;
        }

        .admin-nav a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            color: #cbd5e0;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .admin-nav a:hover,
        .admin-nav a.active {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border-left-color: #667eea;
        }

        .admin-nav a i {
            width: 1.5rem;
            font-size: 1.1rem;
        }

        /* Main Content */
        .admin-main {
            margin-left: 280px;
            background: #f8f9fa;
            min-height: 100vh;
        }

        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-header h2 {
            font-size: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-header h2 i {
            font-size: 2.5rem;
        }

        .admin-user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-user-info .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .admin-user-info .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .admin-content {
            padding: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 250px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .admin-sidebar.active {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .admin-header {
                padding: 1.5rem;
            }

            .admin-header h2 {
                font-size: 1.5rem;
            }

            .toggle-sidebar {
                display: block;
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
            }

            .admin-user-info {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        @media (min-width: 769px) {
            .toggle-sidebar {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
    <!-- Sidebar -->
    <div class="admin-sidebar" id="adminSidebar">
        <div class="brand">
            <h1><i class="fas fa-graduation-cap"></i> SMS</h1>
            <p>School Management System</p>
        </div>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            <a href="{{ route('admin.classes.index') }}" class="{{ request()->routeIs('admin.classes.*') ? 'active' : '' }}">
                <i class="fas fa-school"></i>
                <span>Classes</span>
            </a>
            <a href="{{ route('admin.subjects.index') }}" class="{{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}">
                <i class="fas fa-book"></i>
                <span>Subjects</span>
            </a>
            <a href="{{ route('admin.attendance.create') }}" class="{{ request()->routeIs('admin.attendance.create') ? 'active' : '' }}">
                <i class="fas fa-clipboard-check"></i>
                <span>Attendance</span>
            </a>
            <a href="{{ route('admin.attendance.report') }}" class="{{ request()->routeIs('admin.attendance.report') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i>
                <span>Report</span>
            </a>
            <a href="{{ route('admin.exams.index') }}" class="{{ request()->routeIs('admin.exams.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                <span>Exams</span>
            </a>
            <a href="{{ route('admin.exam_subjects.index') }}" class="{{ request()->routeIs('admin.exam_subjects.*') ? 'active' : '' }}">
                <i class="fas fa-list"></i>
                <span>Exam Subjects</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="admin-main">
        <!-- Header -->
        <div class="admin-header">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-sidebar" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
                <h2><i class="fas fa-laptop"></i> School Management System</h2>
            </div>
            <div class="admin-user-info">
                <span style="font-weight: 500;">Welcome, {{ Auth::user()->name ?? 'Admin' }}!</span>
                <a href="{{ route('logout') }}"
                    class="logout-btn"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="admin-content">
            @yield('content')
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            sidebar.classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('adminSidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');
            if (toggleBtn && !sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>

</html>
