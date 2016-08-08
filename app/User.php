<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password', 'avatar' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function events() 
    {
        return $this->hasMany('App\Event', 'host');
    }
}
