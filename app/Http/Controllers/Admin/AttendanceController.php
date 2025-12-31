<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\StudentProfile;
use App\Models\Classes;

class AttendanceController extends Controller
{
    // Show Attendance form
    public function create(Request $request)
    {
        $classes = Classes::all();
        $students = []; // default empty array

        // If a class is selected, fetch students
        if ($request->has('class_id')) {
            $students = StudentProfile::with('user')
                ->where('class_id', $request->class_id)
                ->get();
        }

        return view('admin.attendance.create', compact('classes', 'students'));
    }


    // Save Attendance
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'date' => 'required|date',
            'attendance' => 'required|array'
        ]);

        foreach ($request->attendance as $student_id => $status) {
            Attendance::updateOrCreate(
                ['student_id' => $student_id, 'date' => $request->date],
                ['class_id' => $request->class_id, 'status' => $status]
            );
        }

        return redirect()->back()->with('success', 'Attendance saved successfully');
    }

    // View attendance report
    public function report()
    {
        $attendances = Attendance::with('student', 'class')->orderBy('date', 'desc')->get();
        return view('admin.attendance.report', compact('attendances'));
    }
}
