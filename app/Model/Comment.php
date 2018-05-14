<?php

namespace App\Model\MainModel;

use Illuminate\Database\Eloquent\Model\MainModel;

class Comment extends MainModel
{
    protected $name = 'content';

    protected $table='comments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'content',
    ];

    /**
     * Get Post Object
     *
     * @return App\Model\Post
     */
    public function post()
    {
        return $this->belongsto('App\Model\Post', 'post_id', 'id');
    }

    /**
     * Get comment's user
     *
     * @return App\Model\User
     */
    public function user()
    {
        return $this->belongsto('App\Model\User', 'user_id', 'id');
    }
}
