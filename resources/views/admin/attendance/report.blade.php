@extends('admin.layouts.app')

@section('content')
<h3>Attendance Report</h3>

<table border="1" cellpadding="10">
    <tr>
        <th>Date</th>
        <th>Class</th>
        <th>Student</th>
        <th>Status</th>
    </tr>
    @foreach($attendances as $att)
    <tr>
        <td>{{ $att->date }}</td>
        <td>{{ $att->class->name }}</td>
        <td>{{ $att->student->user->name }}</td>
        <td>{{ ucfirst($att->status) }}</td>
    </tr>
    @endforeach
</table>
@endsection
