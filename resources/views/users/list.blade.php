@extends('layouts.admin')

@section('content')

    {{ csrf_field() }}
    <div class="row">
        <h2>User List</h2><a class="btn btn-success" href="{{ route('addUser') }}">Add User</a>

        @if( Session::has('message') )
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table">
            <tr>

                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach( $users as $user )
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td><img src="{{ $user->picture }}" alt="{{ $user->name }}"> </td>
                    <td><a href="{{ $user->edit_url }}">Edit</a>

                        <a href="javascript:;"
                           class="delete-user"
                           data-id="{{ $user->id }}"
                        >Delete</a>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->links() }}

    <script>

        $(function () {

            $('.delete-user').click(function () {

                var a = confirm('Are you sure you want to delete this?');
                var $this = $(this);
                var userId = $this.data('id');
                if( a ) {
                    $.ajax({
                        url: '{{ url('users') }}/' + userId ,
                        type: 'delete',
                        dataType : "json",
                        success: function (res) {

                            if( res.status == "success" ) {

                                alert( res.message );
                                $this.closest('tr').remove();

                            }

                        }
                    })
                }

            });


        })
    </script>

@stop