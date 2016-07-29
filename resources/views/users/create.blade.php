@extends('layouts.admin')

@section('content')

    <div class="row">

        @foreach( $errors->all() as $error )
            <p>{{ $error }}</p>
        @endforeach
        <h2>Add User</h2>
        <form action="{{ route('postCreateUser')  }}" class="form" method="post" id="create-user-form" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <div class="form-group"><label for="">Role</label>
                <select name="role_id" id="" class="form-control">
                   @foreach( $roles as $role )
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                       @endforeach
                </select>
            </div>
            <div class="form-group"><label for="">First Name</label><input type="text" name="first_name" class="form-control required"></div>
            <div class="form-group"><label for="">Last Name</label><input type="text" name="last_name" class="form-control required"></div>
            <div class="form-group"><label for="">Address</label><input type="text" name="address" class="form-control"></div>
            <div class="form-group"><label for="">Phone</label><input type="text" name="phone" class="form-control"></div>
            <div class="form-group"><label for="">Email</label><input type="text" name="email" class="form-control email required"></div>
            <div class="form-group"><label for="">Password</label><input type="text" name="password" class="form-control"></div>
            <div class="form-group"><label for="">Image</label>
                <input  type="file" name="image" class="form-control">
            </div>
            <div class="form-group"><label for=""></label><button class="btn btn-info">Save</button></div>
        </form>
    </div>

    <script>

        $(function(){
            $("#create-user-form").validate();
        })
    </script>
@stop