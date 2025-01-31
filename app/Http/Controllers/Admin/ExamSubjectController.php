<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Exam, Classes, Subject, ExamSubject};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamSubjectController extends Controller
{

    public function create()
    {
        return view('admin.exam_subjects.create', [
            'exams' => Exam::all(),
            'classes' => Classes::all(),
            'subjects' => Subject::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
        ]);

        ExamSubject::create($request->all());

        return back()->with('success', 'Exam Subject Assigned');
    }
}
