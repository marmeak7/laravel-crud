@extends('layouts.admin')

@section('content')

    <div class="row">
        @if (Session::has('message') )
            {!! Session::get('message') !!}
        @endif
        <form action="{{ route('postLogin') }}" class="form" method="post">
            {{ csrf_field() }}
            <div class="form-form-group"><label for="">Email</label><input type="text" class="form-control" name="email"></div>
            <div class="form-form-group"><label for="">Password</label><input type="text" class="form-control" name="password"></div>
            <div class="form-form-group"><label for=""></label><button class="btn btn-info">Login</button></div>
        </form>
    </div>
@stop