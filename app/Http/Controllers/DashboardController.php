<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // This works if user is logged in
        if (!$user) {
            return redirect('/login');
        }

        switch ($user->role) {
            case 'admin':
                return view('admin.dashboard');
            case 'teacher':
                return view('teacher.dashboard');
            case 'student':
                return view('student.dashboard');
            case 'parent':
                return view('parent.dashboard');
            default:
                return redirect('/login');
        }
    }
}
