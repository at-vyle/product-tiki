<?php

namespace App\MainModel;

use Illuminate\Database\Eloquent\MainModel;

class OrderDetail extends MainModel
{
    protected $table='order_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'order_id', 'quantity', 'product_price',
    ];

    /**
     * Get Order Object
     *
     * @return App\Model\Order
     */
    public function order()
    {
        return $this->belongsto('App\Model\Order', 'order_id', 'id');
    }
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
