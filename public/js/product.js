
function deleteProduct(e, id) {
  e.preventDefault();
  msg = "Do you want to delete Product ID = " + id;
  if (confirm(msg)) {
    document.getElementById('delete-prd'+id).submit();
  }
}

function deleteImage(url, e) {
  e.preventDefault();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('#csrf-token').attr('content')
    },
    type: "delete",
    url: url,
    data: {},
    success: function (result) {
      console.log('ok');
      document.getElementById('img-' + result.id).remove();
    }
  });
}
