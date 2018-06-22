$(document).ready(function () {
  $.ajax({
    url: "/api/users/profile",
    type: "get",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + accessToken
    },
    success: function(response) {
      let user = response.result;
      avatarPath = user.image_path + user.userinfo.avatar;
      if (user.userinfo.gender == 0) {
        gender = Lang.get('user.index.male');
        $('#edit_profile .modal-body .form-group #gender option[value=0]').attr('selected','selected');
      } else {
        gender = Lang.get('user.index.female');
        $('#edit_profile .modal-body .form-group #gender option[value=1]').attr('selected','selected');
      }

      $('.profile_left .profile_img #crop-avatar img').attr('src', avatarPath);
      $('.profile_left .user_data #user_data_username a').html(user.username);
      $('.profile_left .user_data #user_data_gender a').html(gender);
      $('.profile_left .user_data #user_data_address a').html(user.userinfo.address);
      $('.profile_left .user_data #user_data_email a').html(user.email);

      $('#myTabContent #user_profile .user-info #username').html(user.username);
      $('#myTabContent #user_profile .user-info #email').html(user.email);
      $('#myTabContent #user_profile .user-info #full_name').html(user.userinfo.full_name);
      $('#myTabContent #user_profile .user-info #address').html(user.userinfo.address);
      $('#myTabContent #user_profile .user-info #gender').html(gender);
      $('#myTabContent #user_profile .user-info #dob').html(user.userinfo.dob);
      $('#myTabContent #user_profile .user-info #phone').html(user.userinfo.phone);
      $('#myTabContent #user_profile .user-info #identity_card').html(user.userinfo.identity_card);

      $('#edit_profile .modal-body .form-group #full_name').val(user.userinfo.full_name);
      $('#edit_profile .modal-body .form-group #address').val(user.userinfo.address);
      $('#edit_profile .modal-body .form-group #dob').val(user.userinfo.dob);
      $('#edit_profile .modal-body .form-group #phone').val(user.userinfo.phone);
      $('#edit_profile .modal-body .form-group #identity_card').val(user.userinfo.identity_card);
      $('#edit_profile .modal-body .form-group #img_avatar').attr('src', avatarPath);
    }
  });
})
