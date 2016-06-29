<?php
/**
 * Created by PhpStorm.
 * User: Marmeak7
 * Date: 6/29/2016
 * Time: 7:50 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name'];

    function users() {

        return $this->hasMany( Role::class );
    }

}