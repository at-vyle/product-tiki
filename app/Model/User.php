<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function userinfo()
    {
    	return $this->hasOne('App\Model\UserInfo','user_id','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Model\Comment','user_id','id');
    }
    public function post()
    {
    	return $this->hasMany('App\Model\Post','user_id','id');
    }
    public function order()
    {
    	return $this->hasMany('App\Model\Order','user_id','id');
    }

}
