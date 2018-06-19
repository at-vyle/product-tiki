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
                    <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br />

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
                                <br />
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
                          <div class="button-posts">
                            <button onclick="getUserPosts()" class="btn btn-success col-md-3" id="post active">{{ __('user/profile.show_user_post') }}</button>
                            <button class="btn btn-success col-md-3" id="comment active">{{ __('user/profile.show_user_subcomment') }}</button>
                          </div>
                          <div id="table-content">
                            
                          </div>
                          <nav class="paginate-profile">
                            <a id="next" hidden href="'+  +'">{{ __('user/profile.next') }}</a>
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
