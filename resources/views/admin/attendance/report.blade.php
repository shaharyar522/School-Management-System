@extends('admin.layouts.app')

@section('content')
<h3>Attendance Report</h3>

<form action="{{ route('admin.attendance.report') }}" method="GET" style="margin-bottom:20px;">
    <label for="class_id">Select Class:</label>
    <select name="class_id" id="class_id">
        <option value="">--All Classes--</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                {{ $class->name }}
            </option>
        @endforeach
    </select>

    <label for="date">Select Date:</label>
    <input type="date" name="date" value="{{ request('date') }}">
    <button type="submit">Filter</button>
</form>

<!-- Export Buttons -->
@if(request('class_id') || request('date'))
    <a href="{{ route('admin.attendance.export.pdf', request()->all()) }}" target="_blank">Export PDF</a> |
    <a href="{{ route('admin.attendance.export.excel', request()->all()) }}" target="_blank">Export Excel</a>
@endif

<table border="1" cellpadding="10" style="margin-top:10px;">
    <tr>
        <th>Date</th>
        <th>Class</th>
        <th>Student</th>
        <th>Status</th>
    </tr>
    @forelse($attendances as $att)
    <tr>
        <td>{{ $att->date }}</td>
        <td>{{ $att->class->name }}</td>
        <td>{{ $att->student->user->name }}</td>
        <td>{{ ucfirst($att->status) }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="4">No records found.</td>
    </tr>
    @endforelse
</table>
@endsection
