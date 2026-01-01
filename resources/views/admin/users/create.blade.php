@extends('admin.layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 20px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        color: white;
        text-align: center;
    }

    .form-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
    }

    .form-header p {
        font-size: 1rem;
        opacity: 0.95;
        font-weight: 300;
    }

    .form-content {
        padding: 50px 40px;
    }

    .form-section {
        margin-bottom: 35px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid #667eea;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 25px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 2px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 25px;
    }

    .form-row.full {
        grid-template-columns: 1fr;
    }

    .form-row.three-col {
        grid-template-columns: 1fr 1fr 1fr;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .required {
        color: #e74c3c;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 14px 16px;
        font-size: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        background: #fafafa;
        color: #333;
        transition: all 0.3s ease;
        font-family: inherit;
        height: 50px;
    }

    .form-group input::placeholder,
    .form-group select::placeholder {
        color: #999;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: #667eea;
        background: #fff;
    }

    .form-group input[type="date"] {
        padding: 12px 16px;
    }

    .form-group input:invalid {
        border-color: #e74c3c;
        background: #fff5f5;
    }

    .form-group input:valid,
    .form-group select:valid {
        border-color: #27ae60;
    }

    .form-group .help-text {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-top: 8px;
        font-style: italic;
    }

    .form-group .error-message {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-group .error-message::before {
        content: '⚠';
        font-size: 0.9rem;
    }

    .student-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 30px;
        border-radius: 12px;
        border-left: 5px solid #667eea;
        margin-top: 30px;
        display: none;
        animation: slideDown 0.4s ease-out;
    }

    .student-section.show {
        display: block;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .student-section .form-row {
        margin-bottom: 20px;
    }

    .student-section .form-row:last-child {
        margin-bottom: 0;
    }

    .button-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid #e0e0e0;
    }

    .button-group button,
    .button-group a {
        padding: 16px 30px;
        font-size: 1.05rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        height: 55px;
    }

    .button-group button[type="submit"] {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .button-group button[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .button-group button[type="submit"]:active {
        transform: translateY(-1px);
    }

    .button-group a {
        background: #e0e0e0;
        color: #333;
    }

    .button-group a:hover {
        background: #d0d0d0;
        transform: translateY(-3px);
    }

    .info-box {
        background: #e3f2fd;
        border-left: 5px solid #2196f3;
        padding: 18px 20px;
        border-radius: 8px;
        margin-top: 25px;
        color: #0d47a1;
        font-size: 0.95rem;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .info-box::before {
        content: 'ℹ';
        font-size: 1.5rem;
        font-weight: bold;
        flex-shrink: 0;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .form-row.three-col {
            grid-template-columns: 1fr;
        }

        .form-content {
            padding: 30px 20px;
        }

        .form-header {
            padding: 30px 20px;
        }

        .form-header h1 {
            font-size: 1.8rem;
        }

        .button-group {
            grid-template-columns: 1fr;
        }

        .container {
            border-radius: 10px;
        }
    }

    @media (max-width: 480px) {
        .form-content {
            padding: 20px 15px;
        }

        .form-header {
            padding: 20px 15px;
        }

        .form-header h1 {
            font-size: 1.5rem;
        }

        .form-row {
            gap: 15px;
        }

        .form-group input,
        .form-group select {
            padding: 12px 14px;
            font-size: 0.95rem;
        }

        .button-group button,
        .button-group a {
            padding: 14px 20px;
            font-size: 0.95rem;
            height: 50px;
        }
    }
</style>

<div class="container">
    <div class="form-header">
        <h1>➕ Create New User</h1>
        <p>Add a new user account to your school management system</p>
    </div>

    <div class="form-content">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <!-- Basic Information Section -->
            <div class="form-section">
                <div class="section-title">Basic Information</div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter full name" required>
                        <div class="help-text">First and last name</div>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
                        <div class="help-text">Valid email for login</div>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" id="password" name="password" placeholder="Enter secure password" required>
                        <div class="help-text">Minimum 8 characters recommended</div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">User Role <span class="required">*</span></label>
                        <select id="role" name="role" required>
                            <option value="">-- Select Role --</option>
                            <option value="student" @selected(old('role') === 'student')>👨‍🎓 Student</option>
                            <option value="teacher" @selected(old('role') === 'teacher')>👨‍🏫 Teacher</option>
                            <option value="parent" @selected(old('role') === 'parent')>👨‍👩‍👧 Parent</option>
                        </select>
                        <div class="help-text">Select user type</div>
                        @error('role')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Student Section -->
            <div id="student_fields" class="student-section">
                <div class="section-title">Student Information</div>

                <div class="form-row three-col">
                    <div class="form-group">
                        <label for="class_id">Class</label>
                        <select id="class_id" name="class_id">
                            <option value="">-- Select Class --</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" @selected(old('class_id') === (string)$class->id)>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="roll_no">Roll Number</label>
                        <input type="text" id="roll_no" name="roll_no" value="{{ old('roll_no') }}" placeholder="e.g., 001">
                        @error('roll_no')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" value="{{ old('dob') }}">
                        @error('dob')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <button type="submit">
                    <span>✓</span> Create User
                </button>
                <a href="{{ route('admin.users.index') }}">
                    <span>✕</span> Cancel
                </a>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                Student-specific fields will appear automatically when you select the "Student" role above.
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role');
        const studentFields = document.getElementById('student_fields');
        const classInput = document.getElementById('class_id');
        const rollNoInput = document.getElementById('roll_no');
        const dobInput = document.getElementById('dob');

        function toggleStudentFields() {
            const isStudent = roleSelect.value === 'student';

            if (isStudent) {
                studentFields.classList.add('show');
                classInput.required = true;
                rollNoInput.required = true;
                dobInput.required = true;
            } else {
                studentFields.classList.remove('show');
                classInput.required = false;
                rollNoInput.required = false;
                dobInput.required = false;
            }
        }

        roleSelect.addEventListener('change', toggleStudentFields);
        toggleStudentFields();
    });
</script>
@endsection
