@extends('admin.layout.master')
@section('title', __('product.index.title'))
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      @include('admin.layout.message')
      <div class="x_panel">
        <div class="x_title">
          <h2>@lang('product.index.table-title')</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">

          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title"> @lang('product.index.id') </th>
                  <th class="column-title"> @lang('product.index.category_id') </th>
                  <th class="column-title"> @lang('product.index.name') </th>
                  <th class="column-title col-md-3"> @lang('product.index.description') </th>
                  <th class="column-title"> @lang('product.index.avg_rating') </th>
                  <th class="column-title"> @lang('product.index.price') </th>
                  <th class="column-title"> @lang('product.index.status') </th>
                  <th class="column-title"> @lang('product.index.image') </th>
                  <th class="column-title no-link last">
                    <span class="nobr"> @lang('product.index.action') </span>
                  </th>
                </tr>
              </thead>

              @foreach ($products as $product)
                <tbody>
                  <tr class="odd pointer">
                    <td class=" ">{{ $product->id }}</td>
                    <td class=" ">{{ $product->category_id }}</td>
                    <td class=" ">{{ $product->name }}</td>
                    <td class=" ">{{ $product->description }}</td>
                    <td class=" ">{{ $product->avg_rating }}</td>
                    <td class=" ">{{ $product->price }}</td>
                    <td class=" ">{{ $product->status }}</td>
                    <td class=" ">
                      <img src="" alt="">
                    </td>
                    <td class=" last">
                      <a href="#"> @lang('product.index.edit') </a>
                    </td>
                  </tr>
                </tbody>
              @endforeach

            </table>
          </div>
        </div>
        {{ $products->render() }}
      </div>
    </div>
  </div>
</div>

@endsection
