<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
    * Update the specified resource in storage.
    *
    * @param int $id post id to change status
    *
    * @return array status code
    */
    public function changeStatus($id)
    {
        $post = Post::find($id);
        $product = $post->product;
        if ($post->type == Post::TYPE_REVIEW) {
            if ($post->status == Post::UNAPPROVED) {
                $post->status == Post::APPROVED;
                $product->total_rate += $post->rating;
                $product->rate_count++;
            } else {
                $post->status == Post::UNAPPROVED;
                $product->total_rate -= $post->rating;
                $product->rate_count--;
            }
            $product->avg_rating = round($product->total_rate / $product->rate_count);
            $product->save();
        } else {
            $post->status = !$post->status;
        }
        $post->save();
        $data['status'] = (int) $post->status;
        $data['msg'] = __('post.admin.form.updated');
        return $data;
    }
}
