function deleteAvatar(url, e) {
    e.preventDefault();
    $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('#csrf-token').attr('content')
    },
    type: "post",
    url: url,
    data: {},
    success: function (result) {
        document.getElementById('avatar-' + result.userInfo.id).setAttribute('src', '');
    }
    }); 
}