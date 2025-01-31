@extends('admin.layouts.app')

@section('content')
<h3>Create Exam</h3>

<form method="POST" action="{{ route('admin.exams.store') }}">
@csrf
    <label>Exam Name</label>
    <input type="text" name="name" required>

    <br><br>
    <button type="submit">Save Exam</button>
</form>
@endsection
