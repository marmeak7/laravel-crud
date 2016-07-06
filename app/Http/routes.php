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

Route::get('users/list', ['as' => 'userList', 'uses' => 'UserController@index' ] );
Route::get('users/create',['as' => 'addUser', 'uses' => 'UserController@create' ] );
Route::post('users',['uses' => 'UserController@store','as' => 'saveUser' ] );
Route::get('users/{id}',['uses' =>'UserController@edit','as' => 'editUser' ]);
Route::post('users/{id}',['uses' =>'UserController@update','as' => 'updateUser' ]);

