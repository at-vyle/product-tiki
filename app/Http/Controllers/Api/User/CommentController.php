<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Models\Post $post post to get commments
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $comments = Comment::with(['user.userInfo'])->where('post_id', $post->id)->orderBy('id', 'DESC')->paginate(config('define.post.limit_rows'));

        $data = $this->formatPaginate($comments)->toArray();

        return $this->showAll(collect($data), 200);
    }
}
