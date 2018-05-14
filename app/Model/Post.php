<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Post extends MainModel
{
    protected $table='posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id', 'type', 'content', 'rating', 'status',
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
     * Get Comment Object
     *
     * @return App\Model\Comment
     */
    public function comment()
    {
        return $this->hasMany('App\Model\Comment', 'post_id', 'id');
    }
}
