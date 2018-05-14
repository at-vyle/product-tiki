<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Image extends MainModel
{
    protected $table='images';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'product_id', 'img_url',
    ];
    /**
     * Get Product Object
     *
     * @return App\Model\Product
     */
    public function product()
    {
        return $this->belongsto('App\Model\Product', 'product_id', 'id');
    }
}
