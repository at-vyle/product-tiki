@extends('admin.layout.master')
@section('title', __('user.index.title'))
@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    @include('admin.layout.message')
      <div class="x_panel">
        <div class="x_title">
          <h2>{{ __('user.index.updateuser') }}</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          @if (count($errors))
            <div class="form-group">
<<<<<<< HEAD
              <div class="alert alert-error">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
=======
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ __('user.index.username') }}<span class="required">{{ __('user.index.requied') }}</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="username" name="username" readonly="readonly" value="" class="form-control col-md-7 col-xs-12" placeholder="{{ $user->username }}">
>>>>>>> 64b9d925966d3a643785824f18d10d5a583187a5
              </div>
            </div>
          @endif
          <form id="demo-form2" method="POST" action="{!! route('admin.users.update', array('id' => $result->id)) !!}" enctype="multipart/form-data" class="form-horizontal form-label-left">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ __('user.index.username') }}<span class="required">{{ __('user.index.requied') }}</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="username" name="username" readonly="readonly" value="{{ $result->username }}" class="form-control col-md-7 col-xs-12" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">{{ __('user.index.email') }}<span class="required">{{ __('user.index.requied') }}</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="email" name="email" value="{{ $result->email }}" readonly="readonly" class="form-control col-md-7 col-xs-12" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">{{ __('user.index.fullname') }}<span class="required">{{ __('user.index.requied') }}</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="full_name" name="full_name" value="{{ $user->userInfo['full_name'] }}" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">{{ __('user.index.address') }}<span class="required">{{ __('user.index.requied') }}</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="address" name="address" value="{{ $user->userInfo['address'] }}" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">{{ __('user.index.phone') }}<span class="required">{{ __('user.index.requied') }}</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="phone" name="phone" value="{{ $user->userInfo['phone'] }}" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="identity_card">{{ __('user.index.indentity_card') }}<span class="required">{{ __('user.index.requied') }}</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="identity_card" name="identity_card" value="{{ $user->userInfo['identity_card'] }}" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">{{ __('user.index.avatar') }}</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="avatar" name="avatar" value="{{ $user->userInfo['avatar_url'] }}" class="form-control col-md-7 col-xs-12">
                <img src="{{ $user->userInfo['avatar_url'] }}" alt="" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.gender') }}</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="gender" class="btn-group" data-toggle="buttons">
                
                  <label class="btn btn-default @if (!$user->userInfo['gender']) active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="{{ $user->userInfo['gender'] }}" data-parsley-multiple="gender">&nbsp; {{ __('user.index.male') }}&nbsp; 
                  </label>
               
                  <label class="btn btn-default @if ($user->userInfo['gender']) active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="{{ $user->userInfo['gender'] }}" data-parsley-multiple="gender"> {{ __('user.index.female') }}
                  </label>
                
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.dob') }}</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="dob" name="dob" value="{{ $user->userInfo['dob'] }}" class="form-control col-md-7 col-xs-12" type="date">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">{{ __('user.index.reset') }}</button>
                <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('user.index.update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection