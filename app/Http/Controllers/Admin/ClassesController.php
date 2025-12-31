<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    // Show all classes
    public function index()
    {
        $classes = Classes::all();
        return view('admin.classes.index', compact('classes'));
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

    // Delete class
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class deleted successfully');
    }
}
