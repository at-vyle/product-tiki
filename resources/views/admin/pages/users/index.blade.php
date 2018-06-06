@extends('admin.layout.master')
@section('title', __('user.index.title'))
@section('content')
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    @include('admin.layout.message')
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
                <th class="column-title">@sortablelink('id', __('user.index.id'))</th>
                <th class="column-title">{{ __('user.index.username') }}</th>
                <th class="column-title">{{ __('user.index.email') }} </th>
                <th class="column-title">@sortablelink('userinfo.full_name', __('user.index.fullname'))</th>
                <th class="column-title">{{ __('user.index.gender') }}</th>
                <th class="column-title no-link last"><span class="nobr">{{ __('user.index.action') }}</span>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $user)
                <tr class="even pointer">
                  <td class=" ">{{ $user->id }}</td>
                  <td class=" ">{{ $user->username }}</td>
                  <td class=" ">{{ $user->email }}</td>
                  <td class=" ">{{ $user->userinfo['full_name'] }}</td>
                  @if ( $user->userinfo['gender'] == 1 )
                    <td class="a-right a-right ">{{ __('user.index.female') }}</td>
                  @else 
                    <td class="a-right a-right ">{{ __('user.index.male') }}</td>
                  @endif
                  <td class="last">
                    <a class="col-md-4" href="{{ route('admin.users.edit', ['id' => $user['id']]) }}"><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                    <form class="col-md-4" id="deleted{{ $user->id }}" action="{{ route('admin.users.destroy', ['id' => $user['id']]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="deleteRecord(event, {{ $user->id }})" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                    <a class="col-md-4" href="{{ route('admin.users.show', array('id' => $user->id)) }}"><button class="btn btn-primary"><i class="fa fa-eye icon-size"></i></button></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $result->appends(\Request::except('page'))->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
@section('js')
<script src="/js/messages.js"></script>
<script src="/js/main.js"></script>
@endsection
@endsection
