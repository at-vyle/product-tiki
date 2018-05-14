<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Product extends MainModel
{
    protected $table='products';
    public function orderDetail()
    {
    	return $this->hasMany('App\Model\OrderDetail','product_id','id');
    }
    public function image()
    {
    	return $this->hasMany('App\Model\Image','product_id','id');
    }
    public function post()
    {
    	return $this->hasMany('App\Model\Post','product_id','id');
    }
    public function category()
    {
    	return $this->belongsto('App\Model\Category','category_id','id');
    }
}
