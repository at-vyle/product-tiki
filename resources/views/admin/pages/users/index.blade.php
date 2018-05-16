@extends('admin.layout.master')
@section('title', 'HOME')
@section('content')
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{ __('user.index.showuser') }}</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">{{ __('user.index.id') }}</th>
                  <th class="column-title">{{ __('user.index.username') }}</th>
                  <th class="column-title">{{ __('user.index.email') }} </th>
                  <th class="column-title">{{ __('user.index.fullname') }}</th>
                  <th class="column-title">{{ __('user.index.address') }}</th>
                  <th class="column-title">{{ __('user.index.gender') }}</th>
                  <th class="column-title">{{ __('user.index.is_active') }}</th>
                  <th class="column-title no-link last"><span class="nobr">{{ __('user.index.action') }}</span>
                  </th>
                  <th class="column-title no-link last"><span class="nobr">{{ __('user.index.user_info') }}</span>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr class="even pointer">
                  <td class=" ">1</td>
                  <td class=" ">MaiLuong </td>
                  <td class=" ">mailuong@gmail.com </td>
                  <td class=" ">Lương Thị Mai</td>
                  <td class=" ">Quảng Nam</td>
                  <td class="a-right a-right ">Nữ</td>
                  <td class=" ">0</td>
                  <td class=" last"><a href="#">{{ __('user.index.edit') }} | {{ __('user.index.add') }}</a>
                  <td class=" last"><a href="{{ route('admin.users.show', array('id' => 1)) }}">{{ __('user.index.detail') }}</a>
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