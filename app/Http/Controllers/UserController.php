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

    function store( Request $request ){

        User::create( $request->all() );
        return redirect()->route('userList')->with('message', "<div class='alert alert-success'>Successfully Added</div>");;
    }


    function edit( $id ) {

        $user = User::find( $id );
        $roles= Role::all();
        return view('users.edit',['roles'=> $roles,'user' => $user ]);
    }

    function update( Request $request, $id ) {

        $user = User::find( $id );
        $user->update( $request->only('first_name','last_name', 'email','address', 'phone') );

        return redirect()->route('userList');
    }

    function delete( $id ) {

        $user = User::find( $id );
        $user->delete();
        return redirect()->route('userList')->with('message', "<div class='alert alert-success'>Successfully Deleted</div>");
    }

    function login() {

        return view('users.login');
    }


    function postLogin( Request $request ) {

        if( Auth::attempt( $request->only('email', 'password'))) {

            return redirect()->intended( route('userList') );
        }

        return redirect()->back()->with('message', 'Wrong Username / Password');
    }

    function logout() {

        Auth::logout();

       return redirect()->route('login');
    }




}
