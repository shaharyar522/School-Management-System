<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\StudentProfile;
use App\Models\Classes;


use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;

class AttendanceController extends Controller
{
    // Show Attendance form
    // public function create(Request $request)
    // {
    //     $classes = Classes::all();
    //     $students = []; // default empty array

    //     // If a class is selected, fetch students
    //     if ($request->has('class_id')) {
    //         $students = StudentProfile::with('user')
    //             ->where('class_id', $request->class_id)
    //             ->get();
    //     }

    //     return view('admin.attendance.create', compact('classes', 'students'));
    // }

    public function create(Request $request)
{
    $classes = Classes::all();
    $students = collect(); // empty collection by default

    if ($request->filled('class_id')) {
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
    public function report(Request $request)
    {
        $classes = Classes::all();

        $query = Attendance::with('student.user', 'class')->orderBy('date', 'desc');

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->filled('date')) {
            $query->where('date', $request->date);
        }

        $attendances = $query->get();

        return view('admin.attendance.report', compact('attendances', 'classes'));

    }


    public function exportPdf(Request $request)
{
    $classes = Classes::all();

    $query = Attendance::with('student.user','class')->orderBy('date','desc');
    if($request->filled('class_id')){
        $query->where('class_id',$request->class_id);
    }
    if($request->filled('date')){
        $query->where('date',$request->date);
    }

    $attendances = $query->get();

    $pdf = Pdf::loadView('admin.attendance.report_pdf', compact('attendances'));
    return $pdf->download('attendance_report.pdf');

}

public function exportExcel(Request $request)
{
    return Excel::download(new AttendanceExport($request->class_id, $request->date), 'attendance_report.xlsx');
}



}
