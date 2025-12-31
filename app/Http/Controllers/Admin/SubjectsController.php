<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classes;

class SubjectsController extends Controller
{
    // Show all subjects
    public function index()
    {
        $subjects = Subject::with('class')->get();
        return view('admin.subjects.index', compact('subjects'));
    }

    // Show form to create new subject
    public function create()
    {
        $classes = Classes::all();
        return view('admin.subjects.create', compact('classes'));
    }

    // Store new subject
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class_id' => 'required|exists:classes,id'
        ]);

        Subject::create([
            'name' => $request->name,
            'class_id' => $request->class_id
        ]);

        return redirect()->route('admin.subjects.index')
            ->with('success','Subject created successfully');
    }

    // Delete subject
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success','Subject deleted successfully');
    }
}
