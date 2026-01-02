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
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::when($search, function($query) use ($search) {
            return $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
        })->paginate(15);
        return view('admin.users.index', compact('users', 'search'));
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

    // Show user edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $classes = Classes::all();
        $studentProfile = StudentProfile::where('user_id', $id)->first();
        return view('admin.users.edit', compact('user', 'classes', 'studentProfile'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'class_id' => 'required_if:role,student',
            'roll_no' => 'required_if:role,student'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($user->role == 'student') {
            $student = StudentProfile::where('user_id', $id)->first();
            if ($student) {
                $student->update([
                    'class_id' => $request->class_id,
                    'roll_no' => $request->roll_no,
                    'dob' => $request->dob,
                ]);
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        StudentProfile::where('user_id', $id)->delete();
        TeacherProfile::where('user_id', $id)->delete();
        ParentProfile::where('user_id', $id)->delete();
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
