$(document).ready(function () {
  // $(document).on('click', '.row #myTab #home-tab', function (event) {
  //     event.preventDefault();
  //   })
  $.ajax({
      url: "/api/users/profile",
      type: "get",
      headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + accessToken
      },
      success: function(response) {
        let user = response.result;
        let gender = '';
        console.log(user);
        avatarPath = user.image_path + user.userinfo.avatar
        if (user.userinfo.gender == 0) {
          gender = 'Male';
          icon = '<i class="fa fa-mars"></i>';
        } else {
          gender = 'Female';
          icon = '<i class="fa fa-venus"></i>';
        }

        $('.profile_left .profile_img #crop-avatar img').attr('src', avatarPath);
        $('.profile_left .user_data #user_data_username a').html(user.username);
        $('.profile_left .user_data #user_data_gender').html(icon + '<a>'+ gender +'</a>');
        $('.profile_left .user_data #user_data_address a').html(user.userinfo.address);
        $('.profile_left .user_data #user_data_email a').html(user.email);

        $('#myTabContent #user_profile #username').html(user.username);
        $('#myTabContent #user_profile #email').html(user.email);
        $('#myTabContent #user_profile #full_name').html(user.userinfo.full_name);
        $('#myTabContent #user_profile #address').html(user.userinfo.address);
        $('#myTabContent #user_profile #gender').html(gender);
        $('#myTabContent #user_profile #dob').html(user.userinfo.dob);
        $('#myTabContent #user_profile #phone').html(user.userinfo.phone);
        $('#myTabContent #user_profile #identity_card').html(user.userinfo.identity_card);
      }
  });
})
