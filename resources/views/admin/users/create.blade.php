@extends('admin.layouts.app')

@section('content')
<h1>Add User</h1>

<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    Role:
    <select name="role" id="role" required>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
        <option value="parent">Parent</option>
    </select><br>

    <div id="student_fields">
        Class:
        <select name="class_id">
            @foreach($classes as $class)
            <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select><br>
        Roll No: <input type="text" name="roll_no"><br>
        DOB: <input type="date" name="dob"><br>
    </div>

    <button type="submit">Add User</button>
</form>

<script>
    // Show student fields only if role=student
    const roleSelect = document.getElementById('role');
    const studentFields = document.getElementById('student_fields');

    roleSelect.addEventListener('change', function() {
        studentFields.style.display = this.value === 'student' ? 'block' : 'none';
    });
    studentFields.style.display = roleSelect.value === 'student' ? 'block' : 'none';
</script>
@endsection
