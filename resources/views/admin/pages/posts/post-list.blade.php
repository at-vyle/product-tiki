@extends('admin.layout.master')
@section('title', 'Category List')
@section('content')
  <div class="right_col" role="main" style="min-height: 1162px;">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>{{ __('post.admin.list.title') }}</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="{{ __('post.admin.list.search') }}">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">{{ __('post.admin.list.go') }}</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
      
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>{{ __('post.admin.list.subtitle') }}</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-md-1">#ID</th>
                    <th class="col-md-1">#{{ __('post.admin.list.product_col') }}</th>
                    <th class="col-md-1">{{ __('post.admin.list.type_col') }}</th>
                    <th class="col-md-5">{{ __('post.admin.list.content_col') }}</th>
                    <th class="col-md-1">{{ __('post.admin.list.status_col') }}</th>
                    <th class="col-md-1"># <i class="fa fa-star"></i></th>
                    <th class="col-md-2">{{ __('post.admin.list.action_col') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>the Bird</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>
                      <form action="" class="col-md-4">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-edit" style="font-size:20px"></i></button>
                      </form>
                      <form action="" class="col-md-4">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-trash" style="font-size:20px"></i></button>
                      </form>
                      <form action="" class="col-md-4">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-eye" style="font-size:20px"></i></button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>       
      </div>
    </div>
  </div>

@endsection