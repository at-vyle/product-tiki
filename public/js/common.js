function deletePost(e, id, msg) {
    e.preventDefault();
    msg = msg+id;
    if (confirm(msg)) {
        document.getElementById('delete'+id).submit();
    }
}