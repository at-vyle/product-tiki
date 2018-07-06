$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }

    $(document).on('click', '#send_reset_mail_btn', function (event) {
        event.preventDefault();
        $('#send_reset_mail_form .alert-danger').hide();
        $('#send_reset_mail_form .alert-success').hide();
        $.ajax({
            url: "/api/password/email",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                email: $('#email_receive_mail').val(),
            },
            success: function (response) {
                $('#send_reset_mail_form .alert-success').html(response.result.message);
                $('#send_reset_mail_form .alert-success').show();
            },
            statusCode: {
                422: function (response) {
                    errorMessage = '';
                    if (response.responseJSON.error) {
                        errorMessage += response.responseJSON.error.message;
                    }
                    if (response.responseJSON.errors) {
                        errors = Object.keys(response.responseJSON.errors);
                        errors.forEach(error => {
                            errorMessage += response.responseJSON.errors[error] + '<br/>';
                        });
                    }
                    $('#send_reset_mail_form .alert-danger').html(errorMessage);
                    $('#send_reset_mail_form .alert-danger').show();
                }
            }
        });
    })

    $(document).on('click', '#reset_password_btn', function (event) {
        event.preventDefault();
        $('#reset_password_form .invalid-feedback-email').hide();
        $('#reset_password_form .invalid-feedback-password').hide();
        $('#reset_password_form .invalid-feedback-email').html('');
        $.ajax({
            url: "/api/password/reset",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                token: $('#reset_token').val(),
                email: $('#email_account').val(),
                password: $('#new_password').val(),
                password_confirmation: $('#new_password_confirm').val(),
            },
            success: function (response) {
                $('#reset_password_form .alert-success').html(response.result.message);
                $('#reset_password_form .alert-success').show();
            },
            statusCode: {
                422: function (response) {
                    if (response.responseJSON.error) {
                        $('#reset_password_form .invalid-feedback-email').append(response.responseJSON.error.message);
                        $('#reset_password_form .invalid-feedback-email').show(response.responseJSON.error.message);
                    }
                    if (response.responseJSON.errors) {
                        errors = Object.keys(response.responseJSON.errors);
                        errors.forEach(error => {
                            if (error == 'password') {
                                $('#reset_password_form .invalid-feedback-password').html(response.responseJSON.errors[error]);
                                $('#reset_password_form .invalid-feedback-password').show(response.responseJSON.errors[error]);
                            } else {
                                $('#reset_password_form .invalid-feedback-email').append(response.responseJSON.errors[error]);
                                $('#reset_password_form .invalid-feedback-email').show(response.responseJSON.errors[error]);
                            }
                        });
                    }
                }
            },
            error: function (response) {
                $('#new_password').val('');
                $('#new_password_confirm').val('');
            }
        });
    })
})
