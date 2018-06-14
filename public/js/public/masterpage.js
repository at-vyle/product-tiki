$( document ).ready(function() {
    if (localStorage.getItem('login-token')) {
        checkLogin();
    } else {
        $('.agile-login #header-logout').hide();
    }

    $(document).on('click', '.agile-login #header-logout #btn-logout', function (event) {
        event.preventDefault();
        if (localStorage.getItem('login-token')) {
            $.ajax({
                url: "/api/logout",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('login-token')
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
            Authorization: 'Bearer ' + window.localStorage.getItem('login-token'),
        }),
        success: function (response){
            $('.agile-login #header-login').hide();
        },
        error: function () {
            window.localStorage.removeItem('login-token');
            $('.agile-login #header-logout').hide();
        }
    });
}
