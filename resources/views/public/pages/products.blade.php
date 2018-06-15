@extends('public.layout.master')
@section('title', __('user/master.title.product'))
@section('css')
  <link rel="stylesheet" href="/css/public/custom.css">
@endsection
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li><a href="{{ route('user.home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>{{ __('user/layout.home') }}</a></li>
        <li class="active">{{ __('user/layout.products') }}</li>
      </ol>
    </div>
  </div>
<!-- //breadcrumbs -->
<!-- products -->
  <div class="products">
    <div class="container">
      <div class="col-md-3 products-left">
        <div class="categories">
          <h2>Categories</h2>
          <ul class="cate">
            <li><a><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ __('user/product.price_filter') }}</a></li>
              <ul>
                <li><input type="radio" name="price" class="filter price-filter" value="0,5000000">{{ __('user/product.price_range.0-5m') }}</li>
                <li><input type="radio" name="price" class="filter price-filter" value="5000000,10000000">{{ __('user/product.price_range.5m-10m') }}</li>
                <li><input type="radio" name="price" class="filter price-filter" value="10000000,20000000">{{ __('user/product.price_range.10m-20m') }}</li>
                <li><input type="radio" name="price" class="filter price-filter" value="20000000">{{ __('user/product.price_range.20m') }}</li>
              </ul>
            <li><a><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ __('user/product.rating_filter') }}</a></li>
              <ul>
                <li>
                  <input type="radio" name="rating" class="filter rating-filter" value="1">
                  <i class="fa fa-star blue-star"></i>
                </li>
                <li>
                  <input type="radio" name="rating" class="filter rating-filter" value="2">
                  <i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i>
                </li>
                <li>
                  <input type="radio" name="rating" class="filter rating-filter" value="3">
                  <i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i>
                </li>
                <li>
                  <input type="radio" name="rating" class="filter rating-filter" value="4">
                  <i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i>
                </li>
                <li>
                  <input type="radio" name="rating" class="filter rating-filter" value="5">
                  <i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i><i class="fa fa-star blue-star"></i>
                </li>
              </ul>
          </ul>
        </div>
      </div>
      <div class="col-md-9 products-right">
        <div class="products-right-grid">
          <div class="products-right-grids">
            <div class="sorting">
              <select id="country" class="frm-field required sect">
                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ __('user/product.sort.default') }}</option>
                <option value="quantity_sold"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ __('user/product.sort.popularity') }}</option>
                <option value="price"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ __('user/product.sort.price') }}</option>
                <option value="avg_rating"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ __('user/product.sort.rating') }}</option>
              </select>
            </div>
            <div class="clearfix"> </div>
          </div>
        </div>
        <div id="product-list" class="clearfix agile_top_brands_grids">

        </div>
        <nav class="numbering">
          <a id="next" href="">Get more products</a>
        </nav>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
<!-- //products -->
@endsection
@section('js')
  <script type="text/javascript" src="/js/public/product.js"></script>
@endsection
