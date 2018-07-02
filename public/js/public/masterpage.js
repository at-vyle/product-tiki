$( document ).ready(function() {
    accessToken = localStorage.getItem('login-token');
    if (accessToken) {
        checkLogin();
    } else {
        $('.agile-login #header-login').show();
    }

    $(document).on('click', '.agile-login #header-logout #btn-logout', function (event) {
        event.preventDefault();
        if (accessToken) {
            $.ajax({
                url: "/api/logout",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + accessToken
                },
                type: "post",
                success: function (response) {
                    localStorage.removeItem('login-token');
                    localStorage.removeItem('userLogin');
                    window.location.reload();
                }
            });
        }
    })
});

function checkLogin() {
    $.ajax({
        type: 'GET',
        url: '/api/checkAccessToken',
        headers: ({
            Accept: 'application/json',
            Authorization: 'Bearer ' + accessToken,
        }),
        success: function(response) {
            $('.agile-login #header-logout').show();
            $('.agile-login #header-login').hide();
            localStorage.setItem('userLogin', JSON.stringify(response.result));
        },
        statusCode: {
            401: function() {
                window.localStorage.removeItem('login-token');
                localStorage.removeItem('userLogin');
                $('.agile-login #header-logout').hide();
                $('.agile-login #header-login').show();
            }
        }
    });
}
