<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Http\Response;
use Carbon\Carbon;

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
        $perPage = isset($request->perpage) ? $request->perpage : config('define.limit_rows');
        $request->order = isset($request->order) ? $request->order : config('define.dir_asc');

        $products = Product::filter($request)->with('category', 'images')
            ->when(isset($request->sortBy), function ($query) use ($request) {
                return $query->orderBy($request->sortBy, $request->order);
            })
            ->when(isset($request->limit), function ($query) use ($request) {
                return $query->limit($request->limit);
            })->paginate($perPage);

        $urlEnd = ends_with(config('app.url'), '/') ? '' : '/';
        foreach ($products as $product) {
            $product['price_formated'] = number_format($product['price']);
            $product['image_path'] = config('app.url') . $urlEnd . config('define.product.upload_image_url');
        }

        $products = $this->formatPaginate($products);
        return $this->showAll($products, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product show detail product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->category;
        $product->images;
        $product['price_formated'] = number_format($product['price']);
        $urlEnd = ends_with(config('app.url'), '/') ? '' : '/';
        $product['image_path'] = config('app.url') . $urlEnd . config('define.product.upload_image_url');
        return $this->showOne($product, Response::HTTP_OK);
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
        $type = isset($request->type) ? $request->type : Post::TYPE_REVIEW;

        if ($type == Post::TYPE_REVIEW) {
            $sortBy = isset($request->sortBy) ? $request->sortBy : 'rating';
            $order = isset($request->order) ? $request->order : 'desc';
        }

        $posts = Post::with('user.userInfo')->where('product_id', $product->id)
                ->where('type', $type)
                ->where('status', Post::APPROVED)->orderBy($sortBy, $order)->paginate($perPage);
        foreach ($posts as $post) {
            $post['image_path'] = config('app.url').config('define.images_path_users');
            $createdAt = $post->created_at;
            $post['diff_time'] = $createdAt->diffForHumans(now());
        }

        $data = $this->formatPaginate($posts);
        return $this->showAll($data, Response::HTTP_OK);
    }
}
