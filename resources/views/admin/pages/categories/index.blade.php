@extends('admin.layout.master')
@section('title', __('category.admin.title') )
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
        @include('admin.layout.message')        
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title col-md-3" id="sort-by-name">{{ __('category.admin.table.name') }}
                    @if (app('request')->input('sortBy') == config('define.category.sort_by_name') && app('request')->input('dir') == config('define.dir_desc'))
                      <a href="{{ route('admin.categories.index', ['sortBy' => config('define.category.sort_by_name'), 'dir' => config('define.dir_asc')]) }}">
                        <i class="fa fa-sort-up"></i>
                      </a>
                    @else
                      <a href="{{ route('admin.categories.index', ['sortBy' => config('define.category.sort_by_name'), 'dir' => config('define.dir_desc')]) }}">
                        <i class="fa fa-sort-down"></i>
                      </a>
                    @endif
                  </th>
                  <th class="column-title col-md-3">{{ __('category.admin.add.parent_category') }}</th>
                  <th class="column-title col-md-3" id="sort-by-products_count">{{ __('category.admin.table.sum_product') }}
                    @if (app('request')->input('sortBy') == config('define.category.sort_by_products_count') && app('request')->input('dir') == config('define.dir_desc'))
                      <a href="{{ route('admin.categories.index', ['sortBy' => config('define.category.sort_by_products_count'), 'dir' => config('define.dir_asc')]) }}">
                        <i class="fa fa-sort-up"></i>
                      </a>
                    @else
                      <a href="{{ route('admin.categories.index', ['sortBy' => config('define.category.sort_by_products_count'), 'dir' => config('define.dir_desc')]) }}">
                        <i class="fa fa-sort-down"></i>
                      </a>
                    @endif
                  </th>
                  <th class="column-title no-link last"><span class="nobr">{{ __('category.admin.table.action') }}</span></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listCategories as $list)
                <tr class="even pointer">
                  <td>{{ $list->name }}</td>
                  <td>
                    {{ $list->parent['name'] }}
                  </td>
                  <td>{{ $list->products_count }}</td>
                  <td>
                    <form class="col-md-4">
                      <a class="btn btn-primary" id="edit{{ $list->id }}" href="{{ route('admin.categories.edit', ['id' => $list->id] ) }}"><i class="fa fa-edit"></i></a>
                    </form> 
                    <form class="col-md-4" method="POST" action="{{ route('admin.categories.destroy', ['id' => $list->id]) }}" id="deleted{{ $list->id }}">
                      @method('DELETE')
                      {{ csrf_field() }}
                      <button class="btn btn-danger" type="submit"onclick="deleteRecord(event, {{ $list->id }})"><i class="fa fa-trash icon-size" ></i></button>
                    </form>
                    <form class="col-md-4">
                      <a class="btn btn-primary" href="{{ route('admin.categories.show', ['id' => $list->id]) }}"><i class="fa fa-eye icon-size" ></i></a>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{ $listCategories->render() }}
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
