$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }

    $(document).on('click', '.login-form-grids input[type="submit"]', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/api/register",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                full_name: $('.login-form-grids input[name="full_name"]').val(),
                address: $('.login-form-grids input[name="address"]').val(),
                gender: $('.login-form-grids #gender').val(),
                identity_card: $('.login-form-grids input[name="identity_card"]').val(),
                phone: $('.login-form-grids input[name="phone"]').val(),
                dob: $('.login-form-grids input[name="dob"]').val(),

                username: $('.login-form-grids input[name="username"]').val(),
                email: $('.login-form-grids input[type="email"]').val(),
                password: $('.login-form-grids input[type="password"]').val(),
            },
            success: function (response) {
                localStorage.setItem('login-token', response.result.token);
                window.location.href = 'http://' + window.location.hostname;
            },
            error: function (response) {
                errors = Object.keys(response.responseJSON.errors);
                errors.forEach(error => {
                    $('.login-form-grids #' + error + '_error').html(response.responseJSON.errors[error]);
                    $('.login-form-grids #' + error + '_error').show();
                });
            }
        });
    })
})
