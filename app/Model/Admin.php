<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

//use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     *
     * */
    protected $table = 'admin';
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roleAccess($url) {
        $role = Auth::user()->role;
        if ($role != "SuperAdm") {
            $url = 'clients/' . $url;
        }
        return $url;
    }

}
