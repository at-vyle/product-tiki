@extends('admin.layout.master')
@section('title', __('orders.admin.list.title') )
@section('content')
<script src="/js/messages.js"></script>
<script src="/js/order.js"></script>
<script src="/js/post.js"></script>
  <div class="right_col" role="main" class="index-main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>{{ __('orders.admin.list.title') }}</h3>
        </div>

        <div class="title_right">
          <div class="col-md-10 col-sm-10 col-xs-12 form-group pull-right top_search">
            <form action="{{ route('admin.orders.index') }}" method="GET">
              <div class="input-group">
                <div class="col-md-offset-4">
                  <select name="order_status" class="form-control">
                    <option value="">{{ __('orders.admin.list.subtitle') }}</option>
                    <option value="{{ App\Models\Order::UNAPPROVED }}">{{ __('orders.admin.list.unapproved_order') }}</option>
                    <option value="{{ App\Models\Order::APPROVED }}">{{ __('orders.admin.list.approved_order') }}</option>
                  </select>
                </div>
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">{{ __('post.admin.list.go') }}</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>
                  {{ __('orders.admin.list.subtitle') }}
              </h2>
              <div class="clearfix"></div>
            </div>
              <h2 id="info-message">@if (session()->has('message')) {{ session()->pull('message', 'default') }} @endif</h2>

            <div class="col-md-10 col-md-offset-1" class="list-table">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-md-2">{{ __('orders.admin.list.avatar_col') }}</th>
                    <th class="col-md-2">{{ __('post.admin.list.user_col') }}</th>
                    <th class="col-md-2">
                      {{ __('orders.admin.list.total_product') }}
                      @if (app('request')->input('dir') == 'ASC' && app('request')->input('sortBy') == 'orderdetails_count')
                        <a href="{{ route('admin.orders.index', ['sortBy' => 'orderdetails_count', 'dir' => 'DESC']) }}">
                          <i class="fa fa-sort-up"></i>
                        </a>
                      @else
                        <a href="{{ route('admin.orders.index', ['sortBy' => 'orderdetails_count', 'dir' => 'ASC']) }}">
                          <i class="fa fa-sort-down"></i>
                        </a>
                      @endif
                    </th>
                    <th class="col-md-2">
                      {{ __('orders.admin.list.total_col') }}
                      @if (app('request')->input('dir') == 'ASC' && app('request')->input('sortBy') == 'total')
                        <a href="{{ route('admin.orders.index', ['sortBy' => 'total', 'dir' => 'DESC']) }}">
                          <i class="fa fa-sort-up"></i>
                        </a>
                      @else
                        <a href="{{ route('admin.orders.index', ['sortBy' => 'total', 'dir' => 'ASC']) }}">
                          <i class="fa fa-sort-down"></i>
                        </a>
                      @endif
                    </th>
                    <th class="col-md-2">{{ __('post.admin.list.status_col') }}</th>
                    <th class="col-md-2">{{ __('post.admin.list.action_col') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td><img style="width:100px;height:100px" src="{{ $order['user']['userInfo']['avatar_url'] }}" alt=""></td>
                    <td>{{ $order['user']->username }}</td>
                    <td>{{ $order->orderdetails_count }}</td>
                    <td>{{ number_format($order['total']) }}</td>
                    <td id='status{{ $order['id'] }}'>
                        @if ($order['status'] == App\Models\Order::APPROVED)
                          {{ __('common.approve') }}
                        @elseif ($order['status'] == App\Models\Order::UNAPPROVED)
                          {{ __('common.pending') }}
                        @endif
                    </td>
                    <td>
                      <form action="" class="col-md-4" method="POST">
                        @method('PUT')
                        @csrf
                        <button id="update{{ $order['id'] }}" onclick="updateStatus(event, {{ $order['id'] }}, '{{ route('admin.api.orders.update.status', ['id' => $order['id']]) }}')" class="btn btn-primary update-btn" type="button">
                          @if ($order['status'])
                            <i class="fa fa-times-circle icon-size" ></i>
                          @else
                            <i class="fa fa-check-circle icon-size" ></i>
                          @endif
                        </button>
                      </form>
                      <form action="{{ route('admin.orders.destroy', ['id' => $order['id']]) }}" class="col-md-4" method="POST" id="delete{{ $order['id'] }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="deleteOrder(event, {{ $order['id'] }})" class="btn btn-danger" type="submit"><i class="fa fa-trash icon-size" ></i></button>
                      </form>
                      <form action="{{ route('admin.orders.show', ['id' => $order['id']]) }}" class="col-md-4">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-eye icon-size" ></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{ $orders->render() }}
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

@endsection
