@extends('layouts.admin')
@section('content')
    <div class="row">
        <h2>User List</h2>
        <table class="table">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach( $users as $user )
            <tr>
                <td></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role->name }}</td>
                <td><a href="{{ route('editUser', $user->id) }}">Edit</a>  / Delete </td>

            </tr>
                @endforeach
        </table>
    </div>
@stop