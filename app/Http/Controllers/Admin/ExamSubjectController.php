<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Exam, Classes, Subject, ExamSubject};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamSubjectController extends Controller
{
    public function index()
    {
        $examSubjects = ExamSubject::with(['exam', 'class', 'subject'])->get();
        return view('admin.exam_subjects.index', compact('examSubjects'));
    }

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
            'exam_id' => 'required|exists:exams,id',
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'total_marks' => 'nullable|numeric|min:0',
        ]);

        ExamSubject::create($request->all());

        return back()->with('success', 'Exam Subject Assigned');
    }

    public function show($id)
    {
        $examSubject = ExamSubject::with(['exam', 'class', 'subject'])->findOrFail($id);
        return view('admin.exam_subjects.show', compact('examSubject'));
    }

    public function edit($id)
    {
        $examSubject = ExamSubject::findOrFail($id);
        return view('admin.exam_subjects.edit', [
            'examSubject' => $examSubject,
            'exams' => Exam::all(),
            'classes' => Classes::all(),
            'subjects' => Subject::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $examSubject = ExamSubject::findOrFail($id);

        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'total_marks' => 'nullable|numeric|min:0',
        ]);

        $examSubject->update($request->all());

        return redirect()->route('admin.exam_subjects.index')
            ->with('success', 'Exam Subject Updated');
    }

    public function destroy($id)
    {
        $examSubject = ExamSubject::findOrFail($id);
        $examSubject->delete();

        return redirect()->route('admin.exam_subjects.index')
            ->with('success', 'Exam Subject Deleted');
    }
}
