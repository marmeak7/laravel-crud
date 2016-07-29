<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{


    function index() {


        $users = User::paginate( 10 );
        return view('users.list', compact('users') );
    }

    function create() {

        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    function store( Requests\AddUserForm $request ) {

        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $extension = strrchr( $image->getClientOriginalName(), '.' );
        $imageName = str_replace( $extension, '' , $image->getClientOriginalName() );
        $fileName = $image->getClientOriginalName();
        $i = 0;
        while( file_exists( public_path('uploads/' . $fileName )  ) ) {
            $i++;
            $fileName = $imageName ."-". $i . $extension;
        }
        $image->move( public_path('uploads'), $fileName  );
        $userArr = $request->all();
        $userArr['image'] = $fileName;
        User::create( $userArr );
        return redirect('users/list')->with('message','User successfully created');
    }


    function edit( $id ) {

        $roles = Role::all();
        $user = User::find( $id );

        return view('users.edit', compact('roles', 'user'));
    }

    function update( Request $request, $id ) {

        $user = User::find( $id );
        $user->update( $request->only('first_name', 'last_name','phone','email','address') );
        return redirect('users/list')->with('message','User successfully updated');
    }

    function delete( $id ) {

        $user = User::find( $id );

        if($user->delete() ) {

            return [
                'status' => 'success',
                'message' => "Successfully Deleted"
            ];
        }

    }

    function image() {

        $image = Image::make( public_path('uploads/images.jpg') )
            ->insert(  public_path('uploads/watermark.jpg'),'center'  )
           ->save('resized.jpg');
    }

    function login( ) {
        return view('users.login');
    }

    function postLogin( Request $request ) {

//        ['email' => $request->get('email') ,'password' => $request->get('password')];
        if( Auth::attempt( $request->only('email','password')) ) {
            return redirect()->intended( route('userList') );
        }
        return redirect()->back()->with('message', 'Login Failed');
    }

    function logout() {

        Auth::logout();
        return redirect()->route('login');
    }
}
