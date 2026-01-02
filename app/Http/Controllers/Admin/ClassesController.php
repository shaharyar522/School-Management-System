<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    // Show all classes
    public function index(Request $request)
    {
        $search = $request->search;
        $classes = Classes::when($search, function($query) use ($search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })->paginate(15);
        return view('admin.classes.index', compact('classes', 'search'));
    }

    // Show form to create new class
    public function create()
    {
        return view('admin.classes.create');
    }

    // Store new class
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes,name'
        ]);

        Classes::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class created successfully');
    }

    // Show class edit form
    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return view('admin.classes.edit', compact('class'));
    }

    // Update class
    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:classes,name,' . $id
        ]);

        $class->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class updated successfully');
    }

    // Delete class
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class deleted successfully');
    }
}
