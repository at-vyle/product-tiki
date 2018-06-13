<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('public.pages.products');
    }

    /**
    * Display detail of product.
    *
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        return view('public.pages.detail');
    }
}
