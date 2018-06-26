var nextPageUrl = '';
const UNAPPROVED = 0;
const APPROVED = 1;
const ON_DELIVERY = 2;
const CANCELED = 3;

function showOrder(url) {
  $.ajax({
    url: url,
    type: "get",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + accessToken
    },
    success: function(response) {
      data = response.result.data;

      if (!data) {
        $('#myTabContent #recent_order table tbody #no-record').show();
      } else {
        data.forEach(post => {
          noteHtml = '<td>' + post.note + '</td>';
          totalHtml = '<td>' + post.total + '</td>';
          switch (post.status) {
            case UNAPPROVED:
              statusHtml = '<td class="status">' + Lang.get('common.pending') + '</td>';
              break;
            case APPROVED:
              statusHtml = '<td class="status">' + Lang.get('common.approve') + '</td>';
              break;
            case ON_DELIVERY:
              statusHtml = '<td class="status">' + Lang.get('orders.admin.show.on_delivery') + '</td>';
              break;
            case CANCELED:
              statusHtml = '<td class="status">' + Lang.get('common.cancel') + '</td>';
              break;
            default:
              statusHtml = '<td class="status">' + Lang.get('common.done') + '</td>';
              break;
          }
          actionHtml = '<td><button class="btn btn-primary">' + Lang.get('user.index.detail') + '</button></td>';
          if (post.status == UNAPPROVED) {
            actionHtml += '<td><button class="btn btn-danger" orderId="' + post.id + '">' + Lang.get('common.cancel-btn') + '</button></td>';
          } else {
            actionHtml += '<td><button class="btn btn-danger" disabled="disabled">' + Lang.get('common.cancel-btn') + '</button></td>';
          }

          tableItem = '<tr id="order_' + post.id + '">' + noteHtml + totalHtml + statusHtml + actionHtml + '</tr>';
          $('#myTabContent #recent_order table tbody').append(tableItem);
        });

        nextPageUrl = response.result.paginator.next_page_url;
        if (nextPageUrl) {
          $('#myTabContent #recent_order .paginate-profile #next').show();
        } else {
          $('#myTabContent #recent_order .paginate-profile #next').hide();
        }
      }
    }
  });
}

function cancelOrder(orderId) {
  $.ajax({
    url: 'api/users/orders/' + orderId + '/cancel',
    type: "put",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + accessToken
    },
    success: function(response) {
      $('#myTabContent #recent_order tbody tr[id="order_' + response.result.id + '"] .status').html(Lang.get('common.cancel'));
      $('#myTabContent #recent_order tbody button[orderId="' + response.result.id + '"]').prop("disabled",true);
      alert(Lang.get('common.done'));
    },
    statusCode: {
      500: function(response) {
        alert(response.responseJSON.message);
      }
    }
  });
}

$(document).ready(function() {
  showOrder("/api/orders");

  $(document).on('click', '#myTabContent #recent_order tbody button[orderId]', function(event) {
    event.preventDefault();
    if (confirm(Lang.get('user/profile.cancel_order_confirm'))) {
      cancelOrder($(this).attr('orderId'));
    }
  });

  $(document).on('click', '#myTabContent #recent_order .paginate-profile #next', function(event) {
    event.preventDefault();
    showOrder(nextPageUrl);
  });
});
