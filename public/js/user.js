function deleteUser(e, id) {
    e.preventDefault();
    msg = Lang.get('user.index.messages_delete_js');
    if (confirm(msg)) {
        document.getElementById('delete-user'+id).submit();
    }
}