<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Attendance;

class ExportController extends Controller
{
    // Export Users to CSV
    public function exportUsers()
    {
        $users = User::all();
        $filename = "users_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        );

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Email', 'Role', 'Created At']);

            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email,
                    ucfirst($user->role),
                    $user->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Export Classes to CSV
    public function exportClasses()
    {
        $classes = Classes::all();
        $filename = "classes_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        );

        $callback = function() use ($classes) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Class Name', 'Created At']);

            foreach ($classes as $class) {
                fputcsv($file, [
                    $class->id,
                    $class->name,
                    $class->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Export Subjects to CSV
    public function exportSubjects()
    {
        $subjects = Subject::with('class')->get();
        $filename = "subjects_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        );

        $callback = function() use ($subjects) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Subject Name', 'Class', 'Created At']);

            foreach ($subjects as $subject) {
                fputcsv($file, [
                    $subject->id,
                    $subject->name,
                    $subject->class->name,
                    $subject->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Export Exams to CSV
    public function exportExams()
    {
        $exams = Exam::all();
        $filename = "exams_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        );

        $callback = function() use ($exams) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Exam Name', 'Created At']);

            foreach ($exams as $exam) {
                fputcsv($file, [
                    $exam->id,
                    $exam->name,
                    $exam->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Export Attendance to CSV
    public function exportAttendance()
    {
        $attendance = Attendance::with('student', 'class')->get();
        $filename = "attendance_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        );

        $callback = function() use ($attendance) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Student Name', 'Class', 'Date', 'Status']);

            foreach ($attendance as $record) {
                fputcsv($file, [
                    $record->id,
                    $record->student->name ?? 'N/A',
                    $record->class->name ?? 'N/A',
                    $record->date->format('Y-m-d'),
                    ucfirst($record->status)
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
