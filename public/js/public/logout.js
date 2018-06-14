$(document).ready(function () {
    $(document).on('click', '.agile-login #header-logout #btn-logout', function (event) {
        event.preventDefault();
        if (localStorage.getItem('login-token')) {
            $.ajax({
                url: "/api/logout",
                headers: {
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

    if (localStorage.getItem('login-token')) {
        $('.agile-login #header-login').hide();
    } else {
        $('.agile-login #header-logout').hide();
    }
})
