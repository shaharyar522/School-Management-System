@extends('admin.layouts.app')

@section('content')
<h3>All Subjects</h3>

<a href="{{ route('admin.subjects.create') }}">Add New Subject</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Action</th>
    </tr>
    @foreach($subjects as $subject)
    <tr>
        <td>{{ $subject->id }}</td>
        <td>{{ $subject->name }}</td>
        <td>{{ $subject->class->name }}</td>
        <td>
            <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this subject?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
