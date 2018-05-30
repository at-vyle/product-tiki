$(document).ready(function () {
    function deleteOrder(e, id) {
        e.preventDefault();
        msg = Lang.get('orders.admin.list.delete_msg')+id;
        if (confirm(msg)) {
            document.getElementById('delete' + id).submit();
        }
    }
    var old_val;
    $('#order-status').focus(function () {
        old_val = $(this).val();
    }).change(function () {
        var status = $(this).val();
        console.log(status);
        var id = $(this).data("id");
        if (confirm(Lang.get('orders.admin.show.update_msg'))) {
            $.ajax({
                type: "PUT",
                url: "/api/admin/orders/"+id+"/status",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'json',
                data: {
                    "status": status
                },
                success: function (data) {
                    $('#alert-update').text(data['msg']);
                    $('#alert-update').attr('hidden' , null);
                }
            })
        } else {
            $(this).val(old_val);
        }
    });
});
