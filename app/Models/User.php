<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','first_name','last_name','address','role_id','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['name','edit_url','picture'];


    function role() {

        return $this->belongsTo( Role::class );
    }

    function setPasswordAttribute( $value ) {

        $this->attributes['password'] = bcrypt( $value );
    }

    function getNameAttribute() {

        return $this->first_name ." " . $this->last_name;
    }


    function getEditUrlAttribute( ) {

        return route('editUser', $this->id );
    }

    function getPictureAttribute( ) {

        if( !file_exists( public_path('uploads/' . $this->image) )) {
            return 'http://lorempixel.com/400/200';
        }
        return url('uploads/' . $this->image );
    }



}
