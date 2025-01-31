<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <h2>School Management System - Admin</h2>
    <hr>
    <!-- Admin Menu -->
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
        <a href="{{ route('admin.users.index') }}">Users</a> |
        <a href="{{ route('admin.classes.index') }}">Classes</a> |
        <a href="{{ route('admin.subjects.index') }}">Subjects</a> |
        <a href="{{ route('admin.attendance.create') }}">Attendance</a> |
        <a href="{{ route('admin.attendance.report') }}">Report</a> |
        <a href="{{ route('admin.exams.create') }}">+ Add Exam</a> |
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </nav>

    <hr>

    <!-- Page Content -->
    <div>
        @yield('content')
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

</body>

</html>
