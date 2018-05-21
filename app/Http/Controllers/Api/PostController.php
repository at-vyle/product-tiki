<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function changeStatus($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        $data['status'] = (int) $post->status;
        $data['msg'] = __('post.admin.form.updated');
        return $data;
    }

}
