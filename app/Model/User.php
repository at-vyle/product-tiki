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
        'username', 'email', 'password', 'role' , 'api_token' , 'old_password' , 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];
    /**
     * Get UserInfo Object
     *
     * @return App\Model\UserInfo
     */
    public function userinfo()
    {
        return $this->hasOne('App\Model\UserInfo', 'user_id', 'id');
    }
    /**
     * Get Comment Object
     *
     * @return App\Model\Comment
     */
    public function comment()
    {
        return $this->hasMany('App\Model\Comment', 'user_id', 'id');
    }
    /**
     * Get Post Object
     *
     * @return App\Model\Post
     */
    public function post()
    {
        return $this->hasMany('App\Model\Post', 'user_id', 'id');
    }
    /**
     * Get Order Object
     *
     * @return App\Model\Order
     */
    public function order()
    {
        return $this->hasMany('App\Model\Order', 'user_id', 'id');
    }
}
