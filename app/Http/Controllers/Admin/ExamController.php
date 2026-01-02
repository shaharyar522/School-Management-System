<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $exams = Exam::when($search, function($query) use ($search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })->paginate(15);
        return view('admin.exams.index', compact('exams', 'search'));
    }

    public function create()
    {
        return view('admin.exams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:exams,name'
        ]);

        Exam::create($request->all());

        return redirect()->route('admin.exams.index')
            ->with('success','Exam created successfully');
    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('admin.exams.show', compact('exam'));
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('admin.exams.edit', compact('exam'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:exams,name,' . $id
        ]);

        $exam->update($request->all());

        return redirect()->route('admin.exams.index')
            ->with('success', 'Exam updated successfully');
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('admin.exams.index')
            ->with('success', 'Exam deleted successfully');
    }
}
