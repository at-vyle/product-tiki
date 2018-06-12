<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

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

        $products = Product::when(isset($request->category), function ($query) use ($request) {
            return $query->where('category_id', $request->category);
        })->with("category", "images");

        if (isset($request->sortBy) &&  $request->sortBy != 'selling') {
            $products = $products->orderBy($request->sortBy, $request->order);
        }

        if (isset($request->limit)) {
            $products = $products->limit($request->limit);
        }

        $products = $products->get();

        foreach ($products as $product) {
            $product['quantity_sold'] = $product->orderDetails()->sum('quantity');
        }
        if (isset($request->sortBy) && $request->sortBy == 'selling') {
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
}
