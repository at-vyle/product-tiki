@extends('admin.layout.master')
@section('title', 'Category')
@section('content')
<div class="right_col" role="main" style="min-height: 1381px;">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ __('category.admin.edit.title') }}</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="/admin/categories">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.add.name') }}</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.add.parent_category') }}</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="parent_id">
                    <option value='-1'>Null</option>

                    @foreach ($categoryParent as $parent)
                    <option value="{{ $parent->id }}" @if ($parent->id == $category->parent_id) selected @endif>{{ $parent->name }}</option>
                      
                      <!-- @if ($category->id == $parent->id)
                      <option value="{{ $parent->id }}" checked="checked">{{ $parent->name }}</option>
                      @elseif ($category->id == null)
                      <option value="{{ $parent->id }}" checked="checked"></option>
                      @endif -->
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="submit" name="create" class="btn btn-success">{{ __('category.admin.add.submit') }}</button>
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