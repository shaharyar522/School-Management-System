@extends('admin.layouts.app')

@section('content')
<h3>Add New Class</h3>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.classes.store') }}" method="POST">
    @csrf
    <label>Class Name:</label>
    <input type="text" name="name" placeholder="e.g., 10th Grade">
    <button type="submit">Save</button>
</form>
@endsection
