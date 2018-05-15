<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models\MainModel;

class Category extends MainModel
{
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id'
    ];
    
    /**
     * Get the products for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
