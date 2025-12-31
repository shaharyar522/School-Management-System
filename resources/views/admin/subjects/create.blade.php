@extends('admin.layouts.app')

@section('content')
<h3>Add New Subject</h3>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.subjects.store') }}" method="POST">
    @csrf
    <label>Subject Name:</label>
    <input type="text" name="name" placeholder="e.g., Math">

    <label>Class:</label>
    <select name="class_id">
        <option value="">Select Class</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}">{{ $class->name }}</option>
        @endforeach
    </select>

    <button type="submit">Save</button>
</form>
@endsection
