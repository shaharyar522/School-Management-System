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
        max-width: 1100px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        color: white;
    }

    .page-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: -0.5px;
        margin: 0 0 5px 0;
    }

    .page-header .header-info {
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .page-content {
        padding: 40px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success {
        background: #d4edda;
        border-left: 5px solid #28a745;
        color: #155724;
    }

    .alert-success::before {
        content: '✓';
        font-size: 1.2rem;
        font-weight: bold;
    }

    .form-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 30px;
        border: 2px solid #e0e0e0;
    }

    .form-section h3 {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section h3::before {
        content: '📋';
        font-size: 1.3rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;
    }

    .form-group label {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .required {
        color: #e74c3c;
        font-weight: 700;
    }

    .form-group input,
    .form-group select {
        padding: 12px 16px;
        font-size: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        background: #ffffff;
        color: #333;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-group input::placeholder {
        color: #999;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: #667eea;
    }

    .select-class-group {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 15px;
        align-items: flex-end;
    }

    .select-class-group .form-group {
        margin-bottom: 0;
    }

    .btn {
        padding: 12px 25px;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 14px 30px;
        margin-top: 20px;
        font-size: 1.05rem;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .students-section {
        margin-top: 30px;
    }

    .students-section h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 15px;
        border-bottom: 3px solid #667eea;
    }

    .students-section h3::before {
        content: '👥';
        font-size: 1.4rem;
    }

    .table-wrapper {
        overflow-x: auto;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    table thead {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-bottom: 3px solid #667eea;
    }

    table th {
        padding: 16px 20px;
        text-align: left;
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    table tbody tr {
        border-bottom: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    table tbody tr:hover {
        background: #f8f9ff;
        box-shadow: inset 0 0 10px rgba(102, 126, 234, 0.05);
    }

    table td {
        padding: 16px 20px;
        color: #333;
        font-size: 0.95rem;
    }

    table select {
        padding: 8px 12px;
        font-size: 0.9rem;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        background: white;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 120px;
    }

    table select:hover,
    table select:focus {
        border-color: #667eea;
        outline: none;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .empty-state {
        text-align: center;
        padding: 60px 40px;
        color: #999;
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #666;
    }

    .empty-state p {
        font-size: 0.95rem;
    }

    .date-section {
        background: linear-gradient(135deg, #fff5e1 0%, #ffe4b5 100%);
        padding: 20px;
        border-radius: 10px;
        border-left: 5px solid #ff9800;
        margin-bottom: 20px;
    }

    .date-section .form-group {
        margin-bottom: 0;
    }

    .date-section input {
        height: 45px;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 30px 20px;
        }

        .page-header h1 {
            font-size: 1.8rem;
        }

        .page-content {
            padding: 25px 20px;
        }

        .select-class-group {
            grid-template-columns: 1fr;
        }

        .form-section {
            padding: 20px;
        }

        table th,
        table td {
            padding: 12px 15px;
            font-size: 0.85rem;
        }

        table select {
            min-width: 100px;
        }
    }

    @media (max-width: 480px) {
        .page-header {
            padding: 20px 15px;
        }

        .page-header h1 {
            font-size: 1.5rem;
        }

        .page-content {
            padding: 20px 15px;
        }

        .form-section {
            padding: 15px;
        }

        table {
            font-size: 0.8rem;
        }

        table th,
        table td {
            padding: 10px 8px;
        }

        table select {
            padding: 6px 8px;
            font-size: 0.85rem;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="page-header">
        <h1>📚 Mark Attendance</h1>
        <div class="header-info">Record student attendance for your classes</div>
    </div>

    <div class="page-content">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Select Class Form -->
        <div class="form-section">
            <h3>Step 1: Select Class</h3>
            <form action="{{ route('admin.attendance.create') }}" method="GET">
                <div class="select-class-group">
                    <div class="form-group">
                        <label for="class_id">Select Class <span class="required">*</span></label>
                        <select name="class_id" id="class_id" required>
                            <option value="">-- Select Class --</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span>→</span> Select Class
                    </button>
                </div>
            </form>
        </div>

        <!-- Mark Attendance Form -->
        @if($students->count() > 0)
            <div class="students-section">
                <h3>Students in {{ $students->first()->class->name }}</h3>

                <form action="{{ route('admin.attendance.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="class_id" value="{{ request('class_id') }}">

                    <!-- Date Selection -->
                    <div class="date-section">
                        <div class="form-group">
                            <label for="date">Attendance Date <span class="required">*</span></label>
                            <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <!-- Students Table -->
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->user->name }}</td>
                                    <td>
                                        <select name="attendance[{{ $student->id }}]" required>
                                            <option value="">-- Select --</option>
                                            <option value="present">✓ Present</option>
                                            <option value="absent">✗ Absent</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-submit">
                        <span>💾</span> Save Attendance
                    </button>
                </form>
            </div>
        @else
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <h3>No Students Found</h3>
                <p>Please select a class to view and mark attendance for students.</p>
            </div>
        @endif
    </div>
</div>
@endsection
