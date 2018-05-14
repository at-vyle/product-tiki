<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Product extends MainModel
{
    protected $table='products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'description', 'total_rate', 'rate_count', 'avg_rating', 'price', 'quantity', 'status',
    ];

    /**
     * Get OrderDetail Object
     *
     * @return App\Model\OrderDetail
     */
    public function orderDetail()
    {
        return $this->hasMany('App\Model\OrderDetail', 'product_id', 'id');
    }
    /**
     * Get Image Object
     *
     * @return App\Model\Image
     */
    public function image()
    {
        return $this->hasMany('App\Model\Image', 'product_id', 'id');
    }
    /**
     * Get Post Object
     *
     * @return App\Model\Post
     */
    public function post()
    {
        return $this->hasMany('App\Model\Post', 'product_id', 'id');
    }
    /**
     * Get Category Object
     *
     * @return App\Model\Category
     */
    public function category()
    {
        return $this->belongsto('App\Model\Category', 'category_id', 'id');
    }
}
