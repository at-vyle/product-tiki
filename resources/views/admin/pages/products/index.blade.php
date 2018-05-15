@extends('admin.layout.master')
@section('title', __('product.index.title'))
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
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
                  <th class="column-title"> @lang('product.index.description') </th>
                  <th class="column-title"> @lang('product.index.avg_rating') </th>
                  <th class="column-title"> @lang('product.index.price') </th>
                  <th class="column-title"> @lang('product.index.status') </th>
                  <th class="column-title"> @lang('product.index.image') </th>
                  <th class="column-title"> @lang('product.index.created_at') </th>
                  <th class="column-title"> @lang('product.index.update_at') </th>
                  <th class="column-title no-link last">
                    <span class="nobr"> @lang('product.index.action') </span>
                  </th>
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions (
                      <span class="action-cnt"> </span> )
                      <i class="fa fa-chevron-down"></i>
                    </a>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr class="odd pointer">
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" ">
                    <img src="" alt="">
                  </td>
                  <td class=" "></td>
                  <td class=" "></td>
                  <td class=" last">
                    <a href="#"> @lang('product.index.edit') </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
