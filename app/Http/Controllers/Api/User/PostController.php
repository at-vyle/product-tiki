<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Product      $product product to get post
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        $perPage = isset($request->perpage) ? $request->perpage : config('define.post.limit_rows');
        $sortBy = isset($request->sortBy) ? $request->sortBy : 'id';
        $order = isset($request->order) ? $request->order : 'asc';
        $posts = Post::with(['user.userInfo'])->where('product_id', $product->id)
                ->where('user_id', $request->user_id)
                ->where('status', $request->status)->orderBy($sortBy, $order)->paginate($perPage);
        $data = $this->formatPaginate($posts);
        return $this->showAll($data, Response::HTTP_OK);
    }
}
