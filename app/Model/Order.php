<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Order extends MainModel
{
    protected $table='orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'total', 'status',
    ];
    /**
     * Get User Object
     *
     * @return App\Model\User
     */
    public function user()
    {
        return $this->belongsto('App\Model\User', 'user_id', 'id');
    }
    /**
     * Get OrderDetail Object
     *
     * @return App\Model\OrderDetail
     */
    public function orderDetail()
    {
        return $this->hasMany('App\Model\OrderDetail', 'order_id', 'id');
    }
}
