<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    function index() {

        $users = User::with('role')->get();

        return view( 'users.list',['users' => $users] );
    }


    function create() {

        $roles= Role::all();

        return view('users.create',['roles'=> $roles ]);
    }

    function store( Requests\AddUserForm $request ){

        User::create( $request->all() );
        return redirect()->route('userList')
            ->with('message', "<div class='alert alert-success'>Successfully Added</div>");
    }


    function edit( $id ) {

        $user = User::find( $id );
        $roles= Role::all();
        return view('users.edit',['roles'=> $roles,'user' => $user ]);
    }

    function update( Requests\AddUserForm $request, $id ) {

        $user = User::find( $id );

        $user->update($request->all() );

        return redirect()->route('userList')
            ->with('message', "<div class='alert alert-success'>Successfully Updated</div>");
    }


}
