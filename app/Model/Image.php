<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Image extends MainModel
{
    protected $table='images';
    public function product()
    {
    	return $this->belongsto('App\Model\Product','product_id','id');
    }
}
