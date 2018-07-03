var nextPageUrl = '';
const UNAPPROVED = 0;
const APPROVED = 1;
const ON_DELIVERY = 2;
const CANCELED = 3;
var order_detail;
var order_id;

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
        $('#myTabContent #recent_order #no-record').show();
        $('#myTabContent #recent_order table').hide();
      } else {
        $('#myTabContent #recent_order table tbody').html('');
        data.forEach(order => {
          noteHtml = '<td>' + order.note + '</td>';
          totalHtml = '<td>' + order.total.toLocaleString() + '</td>';
          switch (order.status) {
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
          actionHtml = '<td><button order_id='+ order.id +' class="btn btn-primary btn-order-detail">' + Lang.get('user.index.detail') + '</button></td>';
          if (order.status == UNAPPROVED) {
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

function deleteProduct(event, id) {
    event.preventDefault();
    $('#items_'+id).remove();
}

function showOrderDetail(url) {
  $.ajax({
    url: url,
    type: "get",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + accessToken
    },
    success: function(response) {
      orderDetailList = response.result.order_details;
      productListHtml = '';
      order_detail = orderDetailList;
      order_id = response.result.id;
      orderDetailList.forEach(orderDetail => {
        product = orderDetail.product;
        productListHtml += '<div id="items_'+ product.id +'" class="form-group">\
                              <input type="number" id="product_id_' + product.id + '" value="' + product.id + '" class="product_id_" hidden>\
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">' + product.name + '</label>\
                              <div class="col-md-2 col-sm-6 col-xs-12">\
                                <input type="number" id="quantity_'+ product.id +'" value="' + orderDetail.quantity + '" class="form-control col-md-7 col-xs-12">\
                              </div>\
                              <label class="control-label col-md-2 col-sm-3 col-xs-12">' + orderDetail.product_price.toLocaleString() + '</label>\
                              <label class="control-label col-md-2 col-sm-3 col-xs-12">' + (orderDetail.product_price * orderDetail.quantity).toLocaleString() + '</label>\
                              <button onclick="deleteProduct(event,'+ product.id +')" class="btn btn-danger"><i class="fa fa-trash"></i></button>\
                            </div>';
      });
      productListHtml += '<div class="form-group">\
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">\
                              <button id="update-order" class="btn btn-success btn-order-edit-submit">' + Lang.get('category.admin.add.submit') + '</button>\
                              <button class="btn btn-primary btn-order-detail-back">' + Lang.get('category.admin.add.back') + '</button>\
                            </div>\
                          </div>';
      $('#myTabContent #recent_order #order_detail form').html(productListHtml);

      $('#myTabContent #recent_order table').hide();
      $('#myTabContent #recent_order .paginate-profile #next').hide();

      $('#myTabContent #recent_order #order_detail').show();
    }
  });
}

$(document).ready(function() {
  showOrder('/api/orders');

  $(document).on('click', '#myTabContent #recent_order .paginate-profile #next', function(event) {
    event.preventDefault();
    showOrder(nextPageUrl);
  });

  $(document).on('click', '#myTabContent #recent_order table tbody .btn-order-detail', function(event) {
    event.preventDefault();
    showOrderDetail('/api/orders/' + $(this).attr('order_id'));
  });

  $(document).on('click', '#myTabContent #recent_order #order_detail .btn-order-detail-back', function(event) {
    event.preventDefault();
    $('#myTabContent #recent_order #order_detail').hide();
    showOrder('api/orders');
    $('#myTabContent #recent_order table').show();
    if (nextPageUrl) {
      $('#myTabContent #recent_order .paginate-profile #next').show();
    } else {
      $('#myTabContent #recent_order .paginate-profile #next').hide();
    }
  });

  $(document).on('click', '#update-order', function(event) {
    event.preventDefault();
    let data = [];
    let i = 0;
    let product_data;
    order_detail.forEach(order => {
        product_data = {};
        product = order.product;
        if ($(document).find('#product_id_'+ product.id).length > 0) {
            product_data.id = product.id;
            product_data.quantity = $('#quantity_'+ product.id).val();
            data.push(product_data);
        }
    });
    $.ajax({
        type: 'POST',
        url: '/api/orders/'+order_id,
        headers: ({
            Accept: 'application/json',
            Authorization: 'Bearer ' + accessToken,
        }),
        data: {'products': data, '_method': 'PUT'},
        success: function(response) {
            alertStr = '';

            if (typeof response.result.errors != undefined) {
               response.result.errors.forEach(error => {
                   alertStr += error + '\n';
               });
           } else {
               alertStr = Lang.get('user/cart.submit_success');
           }
           alert(alertStr);
           showOrderDetail('api/orders/'+order_id);
        },
        statusCode: {
            401: function() {
                alert(Lang.get('user/cart.need_login_alert'));
                localStorage.removeItem('login-token');
                window.location.pathname = '/login';
            },
            422: function (response) {
                alertStr = '';
                response.responseJSON.error.forEach(error => {
                    alertStr += error + '\n';
                })
                alert(alertStr);
            }
        }
    });
  });
});
