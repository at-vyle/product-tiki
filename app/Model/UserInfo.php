<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class UserInfo extends MainModel
{
    protected $table='user_info';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'full_name', 'avatar', 'gender', 'dob', 'address', 'phone', 'identity_card',
    ];

    /**
     * Get User Object
     *
     * @return App\Model\User
     */
    public function user()
    {
        return $this->belongsto('App\Model\User', 'user_id', 'id');
    }
}
