<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Category extends MainModel
{
    protected $table='categories';
    public function product()
    {
    	return $this->hasMany('App\Model\Product','category_id','id');
    }
}
