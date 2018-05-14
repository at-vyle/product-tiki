<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Post extends MainModel
{
    protected $table='posts';
    public function product()
    {
    	return $this->belongsto('App\Model\Product','product_id','id');
    }
    public function user()
    {
    	return $this->belongsto('App\Model\User','user_id','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Model\Comment','post_id','id');
    }
}
