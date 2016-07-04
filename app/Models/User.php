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
        'first_name', 'email', 'password','role_id','phone','address','last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['name'];


    function role() {

        return $this->belongsTo( Role::class );
    }


    function setPasswordAttribute( $value ) {

        $this->attributes['password'] = bcrypt( $value );
    }

    function getNameAttribute($value ) {

        return ucwords( $this->first_name . ' ' . $this->last_name  );
    }
}
