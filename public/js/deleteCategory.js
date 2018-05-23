function deleteCategory(e, id) {
  e.preventDefault();
  msg = "Do you want to delete Category Id= " + id;
  if (confirm(msg)) {
    document.getElementById('deleted'+id).submit();
  }
}
