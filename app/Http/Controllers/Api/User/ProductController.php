<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Http\Response;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->formatPaginate(Product::paginate(5));

        return $this->showAll($products, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product show product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->showOne($product);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Product      $product product to get post
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts(Product $product, Request $request)
    {
        $perPage = isset($request->perpage) ? $request->perpage : config('define.post.limit_rows');
        $sortBy = isset($request->sortBy) ? $request->sortBy : 'id';
        $order = isset($request->order) ? $request->order : 'asc';
        $posts = Post::with('user.userInfo')->where('product_id', $product->id)
                ->when(isset($request->status), function ($query) use ($request) {
                    return $query->where('status', $request->status);
                })->orderBy($sortBy, $order)->paginate($perPage);
        $data = $this->formatPaginate($posts);
        return $this->showAll($data, Response::HTTP_OK);
    }
}
