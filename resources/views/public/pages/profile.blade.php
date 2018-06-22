@extends('public.layout.master')
@section('title', __('user/profile.title'))
@section('css')
  <link href="/css/public/profile.css" rel="stylesheet">
@endsection
@section('content')
<div class="top-brands">
  <div class="container">
        <div class="col-md-12">
          <div class="page-title">
            <div class="title_left">
              <h3>{{ __('user/profile.title') }}</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel col-md-12">
                <div class="x_title col-md-12">
                  <h2>{{ __('user/profile.subtitle') }}</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content col-md-12">
                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="/images/avatar/img.jpg" alt="Avatar" title="Change the avatar">
                      </div>
                    </div>

                    <ul class="list-unstyled user_data">
                      <li class="m-top-xs">
                        <i class="fa fa-user"></i>
                        <a>Samuel Doe</a>
                      </li>
                      <li class="m-top-xs">
                        <i class="fa fa-venus"></i>
                        <i class="fa fa-mars"></i>
                      </li>
                      <li class="m-top-xs">
                        <i class="fa fa-map-marker user-profile-icon"></i>
                        <a> San Francisco, California, USA</a>
                      </li>
                      <li class="m-top-xs">
                        <i class="fa fa-envelope user-profile-icon"></i>
                        <a>admin@test.co</a>
                      </li>
                    </ul>
                    <br>
                    <a class="btn btn-success" data-toggle="modal" data-target="#edit_profile"><i class="fa fa-edit m-right-xs"></i>{{ __('user/profile.edit_profile') }}</a>
                    <br />

                    <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden>
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{ __('user/register.form.information') }}</h4>
                          </div>
                          <div class="modal-body">

                              <form id="demo-form2" method="POST" class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">{{ __('user.index.fullname') }}<span class="required">{{ __('user.index.requied') }}</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="full_name" name="full_name" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">{{ __('user.index.address') }}<span class="required">{{ __('user.index.requied') }}</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="address" name="address" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">{{ __('user.index.phone') }}<span class="required">{{ __('user.index.requied') }}</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="phone" name="phone" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="identity_card">{{ __('user.index.indentity_card') }}<span class="required">{{ __('user.index.requied') }}</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="identity_card" name="identity_card" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">{{ __('user.index.avatar') }}</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="avatar" name="avatar" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.gender') }}</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="btn btn-info" id="gender" name="gender">
                                    <option value="">{{ __('user/register.form.gender_default') }}</option>
                                    <option value="0">{{ __('user/register.form.gender_male') }}</option>
                                    <option value="1">{{ __('user/register.form.gender_female') }}</option>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('user.index.dob') }}</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="dob" name="dob" class="form-control col-md-7 col-xs-12" type="date">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="submit" id="edit_profile_submit" class="btn btn-success" value="{{ __('user.index.update') }}">
                                  </div>
                                </div>
                              </form>

                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs-bar bar_tabs" role="tablist">
                        <li role="presentation" class="col-md-3"><a href="#user_profile" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">{{ __('user/profile.user_profile') }}</a>
                        </li>
                        <li role="presentation" class="col-md-3"><a href="#recent_activity" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{ __('user/profile.recent_activity') }}</a>
                        </li>
                        <li role="presentation" class="col-md-3"><a href="#recent_order" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{{ __('user/profile.recent_order') }}</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="user_profile" aria-labelledby="profile-tab">

                          <!-- start user projects -->
                          <ul class="user-info">
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.avatar') }}</h4>
                                <img id="avatar" src="/images/avatar/img.jpg" alt="">
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.username_col') }}</h4>
                                <blockquote id="username" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.email_col') }}</h4>
                                <blockquote id="email" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.fullname_col') }}</h4>
                                <blockquote id="full_name" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.address_col') }}</h4>
                                <blockquote id="address" class="message">Data</blockquote>
                                <br/>
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.gender_col') }}</h4>
                                <blockquote id="gender" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.dob_col') }}</h4>
                                <blockquote id="dob" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.phone_col') }}</h4>
                                <blockquote id="phone" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                            <li>
                              <div class="message_wrapper">
                                <h4 class="heading">{{ __('user/profile.id_col') }}</h4>
                                <blockquote id="identity_card" class="message">Data</blockquote>
                                <br />
                              </div>
                            </li>
                          </ul>
                          <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="recent_activity" aria-labelledby="profile-tab">
                          <div id="table-content">
                          <table class="table-post data table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th class="col-md-10">{{ __('user/profile.profile_content') }}</th>
                                    <th class="col-md-3">{{ __('user/profile.profile_product') }}</th>
                                    <th class="col-md-2">{{ __('user/profile.profile_status') }}</th>
                                    <th class="col-md-2">{{ __('user/profile.profile_type') }}</th>
                                    <th class="col-md-2">{{ __('user/profile.profile_button_comment') }}</th>
                                </tr>
                            </thead>
                          <tbody>
                            <tr id="template-post" style="display:none;"> 
                              <td class="content col-md-10"></td>
                              <td class="prduct-name col-md-3"></td>
                              <td class="status col-md-2"></td>
                              <td class="type col-md-2"></td>
                              <td class="subcomment col-md-2"></td>
                              
                              <table id="replies" hidden class="table-subcomment col-md-offset-3 data table table-striped no-margin">
                                <thead>
                                  <tr>
                                    <th class="col-md-12">Content Subcomment</th>
                                    <th class="col-md-4">Pullname</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="replies-content"></td>
                                    <td class="replies-name"></td>
                                  </tr> 
                                </tbody>
                              </table>
                             
                            </tr> 
                          </tbody>
                        </table>
                          </div>
                          <nav class="paginate-profile">
                            <a id="next" hidden href="">{{ __('user/profile.next') }}</a>
                          </nav>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="recent_order" aria-labelledby="profile-tab">
                          <!-- start user projects -->
                          <table class="data table table-striped no-margin">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Client Company</th>
                                <th class="hidden-phone">Hours Spent</th>
                                <th>Contribution</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>New Company Takeover Review</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">18</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>New Partner Contracts Consultanci</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">13</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Partners and Inverstors report</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">30</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>New Company Takeover Review</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">28</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- end user projects -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
@endsection
@section('js')
<script src="/js/public/profile.js"></script>
<script src="/js/public/userposts.js"></script>
@endsection
