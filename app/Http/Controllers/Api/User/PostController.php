<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Http\Response;
class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Post         $post    post to get commments
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        $perPage = isset($request->perpage) ? $request->perpage : config('define.post.limit_rows');
        $posts = Post::with(['user.userInfo'])->where('product_id', $product->id)->orderBy('id', 'DESC')->paginate($perPage);
        $data = $this->formatPaginate($posts);
        return $this->showAll($data, Response::HTTP_OK);
    }
}