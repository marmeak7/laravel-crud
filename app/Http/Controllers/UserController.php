<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;

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

    function store( Request $request ){

        User::create( $request->all() );

        return redirect()->route('userList');
    }


    function edit( $id ) {

        $user = User::find( $id );
        $roles= Role::all();
        return view('users.edit',['roles'=> $roles,'user' => $user ]);
    }

    function update( Request $request, $id ) {

        $user = User::find( $id );
        $user->update( $request->only('name','email','address', 'phone') );

        return redirect()->route('userList');
    }


}
