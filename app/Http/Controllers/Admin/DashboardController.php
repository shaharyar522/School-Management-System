<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_teachers' => User::where('role', 'teacher')->count(),
            'total_classes' => Classes::count(),
            'total_subjects' => Subject::count(),
            'total_exams' => Exam::count(),
            'today_attendance' => Attendance::whereDate('date', today())->count(),
            'attendance_rate' => $this->getAttendanceRate(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    private function getAttendanceRate()
    {
        $total = Attendance::count();
        if ($total == 0) return 0;

        $present = Attendance::where('status', 'present')->count();
        return round(($present / $total) * 100, 2);
    }
}
