@extends('layouts.admin')
@section('content')
    <div class="row">

        <div>
            <a href="{{ route('addUser') }}" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Add User</a>
        </div>

        @if( Session::has('message') )
            {!!   Session::get('message') !!}
        @endif
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
                <td>
                    <a href="{{ route('editUser', $user->id) }}">Edit</a>

                    <a href="{{ route('deleteUser', $user->id ) }}" class="delete-user" data-id="{{ $user->id }}">Delete</a>
                </td>

            </tr>
                @endforeach
        </table>
    </div>


    <script>

        jQuery(function(){


            $('.delete-user').click( function() {

                var $this = $(this);
                alert( $this.data('id'));
                {{--$.ajax({--}}
                    {{--type : 'get',--}}
                    {{--url : 'users/'{{ $user->id }},--}}
                    {{--data : {--}}
                        {{--id : '{{ $user->id }}'--}}
                    {{--},--}}
                    {{--success: function() {--}}

                    {{--}--}}
                {{--});    --}}
            })


        })
    </script>
@stop