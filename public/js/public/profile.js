if (!localStorage.getItem('login-token')) {
    window.location.href = 'http://' + window.location.hostname + '/login';
}