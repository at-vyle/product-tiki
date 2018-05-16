@extends('admin.layout.master')
@section('title', 'HOME')
@section('content')
  <div class="right_col" role="main">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{ __('user.index.userinfo') }}</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.username') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" readonly="readonly" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.fullname') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" readonly="readonly" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.address') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" readonly="readonly" placeholder="Quảng Nam">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.gender') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" readonly="readonly" placeholder="Nữ">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.avatar') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <img src="/images/img.jpg" alt="img.jpg" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.dob') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="date" class="form-control" readonly="readonly" placeholder="07/02/1994">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.phone') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" readonly="readonly" placeholder="0123412343">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.indentity_card') }}</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" readonly="readonly" placeholder="205676767">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-success">Back</a>
              </div>
            </div>
          </form>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
@endsection