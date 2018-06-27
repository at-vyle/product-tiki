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
              statusHtml = '<td>' + Lang.get('common.pending') + '</td>';
              break;
            case APPROVED:
              statusHtml = '<td>' + Lang.get('common.approve') + '</td>';
              break;
            case ON_DELIVERY:
              statusHtml = '<td>' + Lang.get('orders.admin.show.on_delivery') + '</td>';
              break;
            case CANCELED:
              statusHtml = '<td>' + Lang.get('common.cancel') + '</td>';
              break;
            default:
              statusHtml = '';
              break;
          }
          actionHtml = '<td><button class="btn btn-primary">' + Lang.get('user.index.detail') + '</button></td>';
          if (post.status == UNAPPROVED) {
            actionHtml += '<td><button class="btn btn-danger">' + Lang.get('common.cancel-btn') + '</button></td>';
          } else {
            actionHtml += '<td><button class="btn btn-danger" disabled="disabled">' + Lang.get('common.cancel-btn') + '</button></td>';
          }

          tableItem = '<tr>' + noteHtml + totalHtml + statusHtml + actionHtml + '</tr>';
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

$(document).ready(function() {
  showOrder("/api/orders");

  $(document).on('click', '#myTabContent #recent_order .paginate-profile #next', function(event) {
    event.preventDefault();
    showOrder(nextPageUrl);
  });
});
