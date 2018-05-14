<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Category extends MainModel
{
    protected $table='categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id'
    ];
    /**
     * Create model
     *
     * @return App\Model\Product
     */
    public function product()
    {
        return $this->hasMany('App\Model\Product', 'category_id', 'id');
    }
}
