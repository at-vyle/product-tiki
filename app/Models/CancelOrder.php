<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancelOrder extends Model
{
    protected $table = 'cancel_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_id', 'note',
    ];

    /**
     * Get User of CancelOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'user_id', 'id');
    }

    /**
     * Get Order of CancelOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'order_id', 'id');
    }
}
