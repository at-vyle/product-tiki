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
     * @param \Illuminate\Http\Request $request request content
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = isset($request->perpage) ? $request->perpage : config('define.product.limit_rows');
        $request->order = isset($request->order) ? $request->order : config('define.dir_asc');
        $sortBySelling = 'selling';

        $products = Product::filter($request)->with('category', 'images')
            ->when(isset($request->sortBy) &&  $request->sortBy != $sortBySelling, function ($query) use ($request) {
                return $query->orderBy($request->sortBy, $request->order);
            })
            ->when(isset($request->limit), function ($query) use ($request) {
                return $query->limit($request->limit);
            })->get();

        $urlEnd = ends_with(config('app.url'), '/') ? '' : '/';
        foreach ($products as $product) {
            $product['price_formated'] = number_format($product['price']);
            $product['quantity_sold'] = $product->orderDetails()->sum('quantity');
            $product['image_path'] = config('app.url') . $urlEnd . config('define.product.upload_image_url');
        }

        if (isset($request->sortBy) && $request->sortBy == $sortBySelling) {
            $products = $products->sortByDesc('quantity_sold')->values();
        }

        $products = $this->paginate($products, $perPage);
        $products = $this->formatPaginate($products);
        return $this->showAll($products, Response::HTTP_OK);
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
