<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([ 'middleware' => ['web']], function(){

    Route::get('login',  ['as' => 'login','uses' => 'UserController@login' ]);
    Route::post('login', ['as' => 'postLogin', 'uses' => 'UserController@postLogin' ]);
    Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@logout' ]);

    Route::group(['middleware' => 'auth'], function() {

        Route::get('users/list', ['as' => 'userList', 'uses' => 'UserController@index' ] );
        Route::get('users/create',['as' => 'addUser', 'uses' => 'UserController@create' ] );
        Route::post('users',['uses' => 'UserController@store','as' => 'saveUser' ] );
        Route::get('users/{id}/edit', ['as' => 'editUser', 'uses'=> 'UserController@edit' ] );
        Route::post('users/{id}',['uses' => 'UserController@update','as'=> 'updateUser']);
        Route::get('users/{id}',['uses' => 'UserController@delete', 'as' => 'deleteUser']);
    });

});

