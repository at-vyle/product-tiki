function updateAvatar(url, e) {
    e.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('#csrf-token').attr('content')
        },
        type: "post",
        url: url,
        success: function (result) {
            $('#avatar-' + result.userInfo.id).attr('src', '');
            $('#updated-avatar').hide();   
        }
    });
}
