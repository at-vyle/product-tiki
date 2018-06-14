$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }

    $(document).on('click','.login-form-grids input[type="submit"]', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/api/login",
            type: "post",
            data: {
                email: $('.login-form-grids input[type="email"]').val(),
                password: $('.login-form-grids input[type="password"]').val()
            },
            success: function (response) {
                localStorage.setItem('login-token', response.result.token);
                window.location.href = 'http://' + window.location.hostname;
            },
            statusCode: {
                401: function (response) {
                    alert(response.responseJSON.error);
                }
            }
        });
    })
})
