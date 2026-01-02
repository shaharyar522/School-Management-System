<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classes;

class SubjectsController extends Controller
{
    // Show all subjects
    public function index(Request $request)
    {
        $search = $request->search;
        $subjects = Subject::with('class')
            ->when($search, function($query) use ($search) {
                return $query->where('name', 'like', '%'.$search.'%');
            })->paginate(15);
        return view('admin.subjects.index', compact('subjects', 'search'));
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

    // Show subject edit form
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $classes = Classes::all();
        return view('admin.subjects.edit', compact('subject', 'classes'));
    }

    // Update subject
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'class_id' => 'required|exists:classes,id'
        ]);

        $subject->update([
            'name' => $request->name,
            'class_id' => $request->class_id
        ]);

        return redirect()->route('admin.subjects.index')
            ->with('success','Subject updated successfully');
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
