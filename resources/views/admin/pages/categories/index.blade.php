@extends('admin.layout.master')
@section('title', 'Category')
@section('content')
<div class="right_col" role="main" style="min-height: 1381px;">
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
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.parent_id') }}</th>
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.created_at') }}</th>
                  <th class="column-title" style="display: table-cell;">{{ __('category.admin.table.updated_at') }}</th>
                  <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">{{ __('category.admin.table.action') }}</span>
                  </th>
                  <th class="bulk-actions" colspan="7" style="display: none;">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd pointer">
                  <td class=" ">121000039</td>
                  <td class=" ">May 23, 2014 11:30:12 PM</td>
                  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                  </td>
                  <td class=" ">John Blank L</td>
                  <td class="a-right a-right ">$741.20</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class=" ">121000038</td>
                  <td class=" ">May 24, 2014 10:55:33 PM</td>
                  <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
                  </td>
                  <td class=" ">Mike Smith</td>
                  <td class="a-right a-right ">$432.26</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class=" ">121000037</td>
                  <td class=" ">May 24, 2014 10:52:44 PM</td>
                  <td class=" ">121000204</td>
                  <td class=" ">Mike Smith</td>
                  <td class="a-right a-right ">$333.21</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class=" ">121000040</td>
                  <td class=" ">May 24, 2014 11:47:56 PM </td>
                  <td class=" ">121000210</td>
                  <td class=" ">John Blank L</td>
                  <td class="a-right a-right ">$7.45</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class=" ">121000039</td>
                  <td class=" ">May 26, 2014 11:30:12 PM</td>
                  <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
                  </td>
                  <td class=" ">John Blank L</td>
                  <td class="a-right a-right ">$741.20</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class=" ">121000038</td>
                  <td class=" ">May 26, 2014 10:55:33 PM</td>
                  <td class=" ">121000203</td>
                  <td class=" ">Mike Smith</td>
                  <td class="a-right a-right ">$432.26</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class=" ">121000037</td>
                  <td class=" ">May 26, 2014 10:52:44 PM</td>
                  <td class=" ">121000204</td>
                  <td class=" ">Mike Smith</td>
                  <td class="a-right a-right ">$333.21</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class=" ">121000040</td>
                  <td class=" ">May 27, 2014 11:47:56 PM </td>
                  <td class=" ">121000210</td>
                  <td class=" ">John Blank L</td>
                  <td class="a-right a-right ">$7.45</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class=" ">121000039</td>
                  <td class=" ">May 28, 2014 11:30:12 PM</td>
                  <td class=" ">121000208</td>
                  <td class=" ">John Blank L</td>
                  <td class="a-right a-right ">$741.20</td>
                  <td class=" last"><a href="#">View</a>
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
</div>
@endsection