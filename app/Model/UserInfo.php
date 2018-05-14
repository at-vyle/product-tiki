<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class UserInfo extends MainModel
{
    protected $table='user_info';

    public function user()
    {
    	return $this->belongsto('App\Model\User','user_id','id');
    }
}
