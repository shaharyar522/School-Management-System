@extends('admin.layouts.app')

@section('content')
<h3>All Classes</h3>

<a href="{{ route('admin.classes.create') }}">Add New Class</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($classes as $class)
    <tr>
        <td>{{ $class->id }}</td>
        <td>{{ $class->name }}</td>
        <td>
            <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this class?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
