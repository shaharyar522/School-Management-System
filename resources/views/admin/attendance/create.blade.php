@extends('admin.layouts.app')

@section('content')
<h2>Mark Attendance</h2>

<!-- Display Success Message -->
@if(session('success'))
    <div style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<!-- Select Class Form -->
<form action="{{ route('admin.attendance.create') }}" method="GET">
    <label for="class_id">Select Class:</label>
    <select name="class_id" id="class_id" required>
        <option value="">--Select--</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                {{ $class->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Select Class</button>
</form>

<!-- Show Students Only if Class Selected -->
@if(count($students) > 0)
    <form action="{{ route('admin.attendance.store') }}" method="POST" style="margin-top:20px;">
        @csrf
        <input type="hidden" name="class_id" value="{{ request('class_id') }}">

        <label for="date">Select Date:</label>
        <input type="date" name="date" value="{{ date('Y-m-d') }}" required>

        <table border="1" cellpadding="10" style="margin-top:10px;">
            <tr>
                <th>Student Name</th>
                <th>Status</th>
            </tr>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->user->name }}</td>
                <td>
                    <select name="attendance[{{ $student->id }}]">
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </table>

        <button type="submit" style="margin-top:10px;">Save Attendance</button>
    </form>
@endif

@endsection
