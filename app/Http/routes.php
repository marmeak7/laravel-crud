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

Route::get('login','UserController@login')->name('login');
Route::post('login','UserController@postLogin')->name('postLogin');

Route::group(['middleware' => ['auth']], function( ) {


    Route::get('users/list', 'UserController@index')->name('userList');
    Route::get('users/create', ['uses' => 'UserController@create','as' => 'addUser' ] );
    Route::post('users', ['as' => 'postCreateUser', 'uses' => 'UserController@store'] );
    Route::post('users/{id}', ['as' => 'postEditUser', 'uses' => 'UserController@update'] );
    Route::get('users/{id}/edit', ['as' => 'editUser', 'uses' => 'UserController@edit' ]);
    Route::delete('users/{id}',['as' => 'deleteUser', 'uses' => 'UserController@delete']);
    Route::get('image', 'UserController@image');
    Route::get('logout',['uses' => 'UserController@logout','as' =>'logout']);
});

