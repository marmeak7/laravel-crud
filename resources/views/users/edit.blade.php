@extends('layouts.admin')
@section('content')

    <div class="row">


        <h2>Add User</h2>
        <form action="{{ route('updateUser',$user->id) }}" class="form" method="post">
            {{ csrf_field() }}
            <div class="form-group"><label for="">Role</label>
                <select name="role_id" id="" class="form-control">
                    @foreach( $roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Name</label><input type="text" class="form-control" name="first_name" value="{{ $user->name }}">
                {{ $errors->first('first_name') }}
            </div>
            <div class="form-group"><label for="">Email</label><input type="text" class="form-control" value="{{ $user->email }}" name="email"></div>
            <div class="form-group"><label for="">Address</label><input type="text" class="form-control" value="{{ $user->address }}" name="address"></div>
            <div class="form-group"><label for="">Phone</label><input type="text" class="form-control" name="phone" value="{{ $user->phone }}"></div>
            <div class="form-group"><label for=""></label><button class="btn btn-success">Save</button></div>
        </form>
    </div>
@stop