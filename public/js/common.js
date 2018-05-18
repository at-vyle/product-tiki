function deletePost(e, id) {
    e.preventDefault();
    msg = "Do you want to delete posts with ID "+id;
    if (confirm(msg)) {
        document.getElementById('delete'+id).submit();
    }
}