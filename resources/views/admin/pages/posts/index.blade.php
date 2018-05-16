@extends('admin.layout.master')
@section('title', __('post.admin.list.title') )
@section('content')
  <div class="right_col" role="main" class="index-main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>{{ __('post.admin.list.title') }}</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <form action="{{ route('admin.posts.find') }}" method="POST">
              @csrf
              <div class="input-group">              
                <input type="text" name="content" class="form-control" placeholder="{{ __('post.admin.list.search') }}">
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
              <h2>{{ __('post.admin.list.subtitle') }}</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" class="list-table">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-md-1">{{ __('post.admin.list.user_col') }}</th>
                    <th class="col-md-2">{{ __('post.admin.list.product_col') }}</th>
                    <th class="col-md-1">{{ __('post.admin.list.type_col') }}</th>
                    <th class="col-md-4">{{ __('post.admin.list.content_col') }}</th>
                    <th class="col-md-1">{{ __('post.admin.list.status_col') }}</th>
                    <th class="col-md-1"># <i class="fa fa-star"></i></th>
                    <th class="col-md-2">{{ __('post.admin.list.action_col') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $posts as $post )
                  <tr>
                    <td>{{ $post['user']->username }}</td>
                    <td>{{ $post['product']->name }}</td>
                    <td>
                      @if ( $post['type'] == 1 ) 
                        {{ __('post.admin.form.type_reviews') }}
                      @else 
                        {{ __('post.admin.form.type_comments') }}
                      @endif
                    </td>
                    <td>{{ $post['content'] }}</td>
                    <td>
                        @if ( $post['status'] ) 
                          {{ __('post.admin.list.status') }}
                        @endif
                    </td>
                    <td>{{ $post['rating'] }}</td>
                    <td>
                      <form action="" class="col-md-4">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-edit icon-size" ></i></button>
                      </form>
                      <form action="" class="col-md-4">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-trash icon-size" ></i></button>
                      </form>
                      <form action="" class="col-md-4">
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
        <div class="clearfix"></div>       
      </div>
    </div>
  </div>

@endsection