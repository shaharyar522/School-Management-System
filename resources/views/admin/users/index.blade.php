@extends('admin.layouts.app')

@section('content')
<h1>All Users</h1>
<a href="{{ route('admin.users.create') }}">Add User</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
    </tr>
    @endforeach
</table>
@endsection
