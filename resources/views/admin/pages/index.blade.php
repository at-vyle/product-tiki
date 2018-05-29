@extends('admin.layout.master')
@section('title', __('homepage.admin.title'))
@section('css')
  <link rel="stylesheet" href="/css/homepage.css">
@endsection
@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="row top_tiles">
      <div class="x_title col-md-12">
        <a class="btn col-md-3 @if (app('request')->input('time') == null || app('request')->input('time') == 'month') active-filter @endif" href="{{ route('admin.home', ['time' => 'month']) }}">{{ __('homepage.admin.statistic.monthly') }}</a>
        <a class="btn col-md-3 @if (app('request')->input('time') == 'year') active-filter @endif" href="{{ route('admin.home', ['time' => 'year']) }}">{{ __('homepage.admin.statistic.annually') }}</a>
        <a class="btn col-md-3 @if (app('request')->input('time') == 'week') active-filter @endif" href="{{ route('admin.home', ['time' => 'week']) }}">{{ __('homepage.admin.statistic.weekly') }}</a>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count">{{ $newUsers }}</div>
          <h3>{{ __('homepage.admin.new_users') }}</h3>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-comments-o"></i></div>
          <div class="count">{{ $newPosts }}</div>
          <h3>{{ __('homepage.admin.new_posts') }}</h3>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-list-alt"></i></div>
          <div class="count">{{ $newOrders }}</div>
          <h3>{{ __('homepage.admin.new_orders') }}</h3>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-balance-scale"></i></div>
          <div class="count">{{ $productSold }}</div>
          <h3>{{ __('homepage.admin.product_sold') }}</h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="col-md-8">{{ __('homepage.admin.top_rating_product') }} </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <small class="col-md-6">{{ __('homepage.admin.time.all') }}</small>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @php $i = 0 @endphp
            @foreach ($topRating as $product)
              <div class="media event">
                <a class="pull-left date">
                  <p class="month">{{ __('homepage.admin.top_text') }}</p>
                  <p class="day">{{ ++$i }}</p>
                </a>
                <div class="media-body">
                  <a class="title" href="{!! route('admin.products.edit', ['id' => $product['id']]) !!}">
                    <div class="details">
                      <p>{{ $product->name }}</p>
                      <p>{{ $product->category->name }}</p>
                      <p>{{ $product->avg_rating.' '.__('homepage.admin.avg_rating') }}</p>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="col-md-8">{{ __('homepage.admin.top_active_user') }}</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hourglass"></i></a>
                <ul class="dropdown-menu dropdown-user" role="menu">
                  <li><a href="{{ route('admin.api.home', ['type' => 'user']) }}">{{ __('homepage.admin.time.all') }}</a></li>
                  <li><a href="{{ route('admin.api.home', ['type' => 'user', 'time' => 'week']) }}">{{ __('homepage.admin.time.week') }}</a></li>
                  <li><a href="{{ route('admin.api.home', ['type' => 'user', 'time' => 'month']) }}">{{ __('homepage.admin.time.month') }}</a></li>
                  <li><a href="{{ route('admin.api.home', ['type' => 'user', 'time' => 'year']) }}">{{ __('homepage.admin.time.year') }}</a></li>
                </ul>
              </li>
            </ul>
            <small class="col-md-6" id="user_time">{{ __('homepage.admin.time.all') }}</small>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @php $i = 0 @endphp
            @foreach ($users as $user)
              <div class="media event">
                <a class="pull-left date">
                  <p class="month">{{ __('homepage.admin.top_text') }}</p>
                  <p class="day">{{ ++$i }}</p>
                </a>
                <div class="media-body">
                  <a id="user_route_{{ $i }}" data-id="user_route_{{ $i }}" class="title user_route" href="{{ route('admin.users.show', array('id' => $user->id)) }}">
                    <div class="details">
                      <p id="user_name_{{ $i }}">{{ $user->userInfo->full_name }}</p>
                      <p id="user_email_{{ $i }}">{{ $user->email }}</p>
                      <p ><span id="user_point_{{ $i }}">{{ $user->point }} </span> {{ __('homepage.admin.post_comments') }}</p>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="col-md-8">{{ __('homepage.admin.top_worth_order') }} </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hourglass"></i></a>
                <ul class="dropdown-menu dropdown-order" role="menu">
                  <li><a href="{{ route('admin.api.home', ['type' => 'order']) }}">{{ __('homepage.admin.time.all') }}</a></li>
                  <li><a href="{{ route('admin.api.home', ['type' => 'order', 'time' => 'week']) }}">{{ __('homepage.admin.time.week') }}</a></li>
                  <li><a href="{{ route('admin.api.home', ['type' => 'order', 'time' => 'month']) }}">{{ __('homepage.admin.time.month') }}</a></li>
                  <li><a href="{{ route('admin.api.home', ['type' => 'order', 'time' => 'year']) }}">{{ __('homepage.admin.time.year') }}</a></li>
                </ul>
              </li>
            </ul>
            <small class="col-md-6" id="order_time">{{ __('homepage.admin.time.all') }}</small>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @php $i = 0 @endphp
            @foreach ($topOrders as $order)
              <div class="media event">
                <a class="pull-left date">
                  <p class="month">{{ __('homepage.admin.top_text') }}</p>
                  <p class="day">{{ ++$i }}</p>
                </a>
                <div class="media-body">
                  <a id="order_route_{{ $i }}" data-id="order_route_{{ $i }}" class="title order_route" href="{{ route('admin.orders.show', ['id' => $order['id']]) }}">
                    <div class="details">
                      <p id="order_username_{{ $i }}">{{ $order->user->username }}</p>
                      <p id="order_total_{{ $i }}">{{ number_format($order->total) }}</p>
                      <p ><span id="order_product_count_{{ $i }}">{{ $order->orderdetails_count }}</span> {{ __('homepage.admin.product_count') }}</p>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('js')
  <script src="/js/homepage.js"></script>
@endsection
@endsection
