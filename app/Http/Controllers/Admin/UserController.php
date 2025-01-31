<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\TeacherProfile;
use App\Models\ParentProfile;
use App\Models\Classes;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show create form
    public function create()
    {
        $classes = Classes::all(); // For student class assignment
        return view('admin.users.create', compact('classes'));
    }

    // Store new user
    public function store(Request $request)
    {

        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users,email',
        //     'password'=>'required|min:6',
        //     'role'=>'required',
        // ]);


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
            'class_id' => 'required_if:role,student',
            'roll_no' => 'required_if:role,student|unique:student_profiles,roll_no,NULL,id,class_id,' . $request->class_id
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Create profile based on role
        if ($user->role == 'student') {
            StudentProfile::create([
                'user_id' => $user->id,
                'class_id' => $request->class_id,
                'roll_no' => $request->roll_no,
                'dob' => $request->dob,
            ]);
        } elseif ($user->role == 'teacher') {
            TeacherProfile::create([
                'user_id' => $user->id,
            ]);
        } elseif ($user->role == 'parent') {
            ParentProfile::create([
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }
}
