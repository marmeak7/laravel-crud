@extends('layouts.admin')

@section('content')

    <div class="row">
        <h2>Add User</h2>
        <form action="{{ route('postEditUser', $user->id)  }}" class="form" method="post" >
            {{ csrf_field() }}

            <div class="form-group"><label for="">Role</label>
                <select name="role_id" id="" class="form-control">
                    @foreach( $roles as $role )
                        <option value="{{ $role->id }}">{{ $role->name }}</option>l
                    @endforeach
                </select>
            </div>
            <div class="form-group"><label for="">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
            </div>
            <div class="form-group"><label for="">Last Name</label><input type="text" name="last_name"
                                                                          value="{{ $user->last_name }}" class="form-control"></div>
            <div class="form-group"><label for="">Address</label>
                <input type="text" name="address"  value="{{ $user->address }}" class="form-control"></div>
            <div class="form-group"><label for="">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}"></div>
            <div class="form-group"><label for="">Email</label><input value="{{ $user->email }}" type="text" name="email" class="form-control"></div>
            <div class="form-group"><label for=""></label><button class="btn btn-info">Sae</button></div>
        </form>
    </div>
@stop