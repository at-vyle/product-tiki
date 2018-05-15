<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models\MainModel;

class Image extends MainModel
{
    protected $table = 'images';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'product_id', 'img_url',
    ];

    /**
     * Get Images of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
