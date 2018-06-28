<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteOrder extends Model
{
    protected $table = 'note_order';

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
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Get Order of CancelOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
}
