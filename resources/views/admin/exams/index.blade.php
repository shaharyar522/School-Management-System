@extends('admin.layouts.app')

@section('content')
<h3>Exams List</h3>

<a href="{{ route('admin.exams.create') }}">+ Add Exam</a>

<table border="1" cellpadding="10">
<tr>
    <th>#</th>
    <th>Name</th>
</tr>
@foreach($exams as $exam)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $exam->name }}</td>
</tr>
@endforeach
</table>
@endsection
