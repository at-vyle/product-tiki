@extends('admin.layout.master')
@section('title', __('category.admin.list.title') )
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{ __('category.admin.list.title') }}</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.id') }}</th>
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.name') }}</th>
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.child_category') }}</th>
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.created_at') }}</th>
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.updated_at') }}</th>
                </tr>
              </thead>
              <tbody>
              
                <tr class="even pointer">
                  <td>{{ $itemCategory->id }}</td>
                  <td>{{ $itemCategory->name }}</td>
                  <td></td>
                  <td>{{ $itemCategory->created_at }}</td>
                  <td class="a-right a-right ">{{ $itemCategory->updated_at }}</td>
                  </td>
                </tr>
                @foreach ($childCategory as $child)
                <tr class="even pointer">
                  <td>{{ $child->id }}</td>
                  <td></td>
                  <td>
                  {{ $child->name }}
                  </td>
                  <td>{{ $child->created_at }}</td>
                  <td class="a-right a-right ">{{ $child->updated_at }}</td>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection