@extends('layouts.login')

@section('content')

    <div class="row">

        @if( Session::has('message'))
            {{ Session::get('message') }}
            @endif
        <form action="{{ route('postLogin') }}" method="post">
            <div class="form-group">Email<label for=""></label><input type="text" name="email" class="form-control"></div>
            <div class="form-group">Password<label for=""></label><input type="text" name="password" class="form-control"> </div>
            <div class="form-group"><label for=""></label><button class="btn btn-success">Login</div>
        </form>
    </div>
@stop