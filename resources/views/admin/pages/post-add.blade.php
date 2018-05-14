@extends('admin.layout.master')
@section('title', 'Add Category')
@section('content')
  <div class="right_col" role="main" style="min-height: 3619px;">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>{{ __('post.form.title') }}</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>{{ __('post.form.form_title') }}</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
              <br>
              <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('post.form.type') }}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="post-type" class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="type" value="reviews"> &nbsp; {{ __('post.form.type_reviews') }} &nbsp;
                      </label>
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="type" value="comments">  &nbsp;  {{ __('post.form.type_comments') }} &nbsp; 
                      </label>
                    </div>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ __('post.form.content') }} <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <textarea class="resizable_textarea form-control" placeholder="{{ __('post.form.content_hint') }}" style="margin-top: 0px; margin-bottom: 0px; height: 54px;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('post.form.user_id') }}</label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <select class="select2_group form-control">
                      <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('post.form.product_id') }}</label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <select class="select2_group form-control">
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                        </optgroup>
                      </select>
                    </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('post.form.rate') }}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="rating" class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="rate" value="1"> &nbsp; 1 &nbsp;
                      </label>
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="rate" value="2">  &nbsp; 2 &nbsp; 
                      </label>
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="rate" value="3">  &nbsp; 3 &nbsp; 
                      </label>
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="rate" value="4">  &nbsp; 4 &nbsp; 
                      </label>
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="rate" value="5">  &nbsp; 5 &nbsp; 
                      </label>
                    </div>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

