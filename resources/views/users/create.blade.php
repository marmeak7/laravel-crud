@extends('layouts.admin')
@section('content')

    <div class="row">
        <h2>Add User</h2>


        <form action="{{ route('saveUser') }}" class="form" method="post">
            {{ csrf_field() }}
            <div class="form-group"><label for="">Role</label>
                <select name="role_id" id="" class="form-control">
                    @foreach( $roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                {{ $errors->first('first_name') }}
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                {{ $errors->first('last_name') }}
            </div>
            <div class="form-group"><label for="">Email</label><input type="text" class="form-control" name="email">
                {{ $errors->first('email') }}
            </div>
            <div class="form-group"><label for="">Address</label><input type="text" class="form-control" name="address"></div>
            <div class="form-group"><label for="">Phone</label><input type="text" class="form-control" name="phone"></div>
            <div class="form-group"><label for="">Password</label><input type="password" class="form-control" name="password"></div>
            <div class="form-group"><label for=""></label><button class="btn btn-success">Save</button></div>
        </form>
    </div>
@stop