<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     *
    **/ 
      protected $table = 'admin';

      protected $hidden = [
        'password', 'remember_token',
    ];
}
