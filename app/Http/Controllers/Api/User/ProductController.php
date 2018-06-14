<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Product;

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
        $product['price_formated'] = number_format($product->price);
        $product['image_path'] = config('app.url') . config('define.product.upload_image_url');
        $product->category;
        $product->images;
        return $this->showOne($product);
    }
}
