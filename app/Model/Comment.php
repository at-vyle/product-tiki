<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Comment extends MainModel
{
    protected $table='comments';
    public function post()
    {
    	return $this->belongsto('App\Model\Post','post_id','id');
    }
    public function user()
    {
    	return $this->belongsto('App\Model\User','user_id','id');
    }
}
