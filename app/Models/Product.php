<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models\MainModel;

class Product extends MainModel
{
    protected $table = 'products';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'product_id', 'id');
    }

    /**
     * Get Image of Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function image()
    {
        return $this->hasMany('App\Models\Image', 'product_id', 'id');
    }

    /**
     * Get Post of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post()
    {
        return $this->hasMany('App\Models\Post', 'product_id', 'id');
    }
    
    /**
     * Get Category Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
