$( document ).ready(function() {
    accessToken = localStorage.getItem('login-token');
    if (accessToken) {
        checkLogin();
    } else {
        $('.agile-login #header-logout').hide();
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
        success: function (response){
            $('.agile-login #header-login').hide();
        },
        statusCode: {
            401: function (response) {
                window.localStorage.removeItem('login-token');
                $('.agile-login #header-logout').hide();
            }
        }
    });
}
