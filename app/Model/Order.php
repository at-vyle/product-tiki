<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Order extends MainModel
{
    protected $table='orders';
    public function user()
    {
    	return $this->belongsto('App\Model\User','user_id','id');
    }
    public function orderDetail()
    {
    	return $this->hasMany('App\Model\OrderDetail','order_id','id');
    }
    
}
