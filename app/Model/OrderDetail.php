<?php

namespace App\MainModel;

use Illuminate\Database\Eloquent\MainModel;

class OrderDetail extends MainModel
{
    protected $table='order_details';
    public function order()
    {
    	return $this->belongsto('App\Model\Order','order_id','id');
    }
    public function product()
    {
    	return $this->belongsto('App\Model\Product','product_id','id');
    }
}
