$(document).ready(function () {
    var url = '';
    if (window.location.search == "") {
        url = api.api_products_index;
    } else {
        url = api.api_products_index + window.location.search;
    }

    $('.rating-filter').click(function() {
        if (url.indexOf('?') > 0) {
            url += '&rating=' + $(this).val();
        } else {
            url += '?rating=' + $(this).val();
        }
        console.log(url);
        $('#product-list').html('');
        getProductList(url);
    });

    $('.price-filter').click(function() {
        if (url.indexOf('?') > 0) {
            url += '&price=' + $(this).val();
        } else {
            url += '?price=' + $(this).val();
        }
        url +=
        console.log(url);
        $('#product-list').html('');
        getProductList(url);
    });

    $(document).on('change', '#country', function () {
        sortBy = $('#country').val();
        if (url.indexOf('?') > 0) {
            url += '&sortBy='+sortBy;
        } else {
            url += '?sortBy='+sortBy;
        }

        if (sortBy === 'rating' || sortBy === 'price') {
            url += '&order=DESC';
        }
        $('#product-list').html('');
        getProductList(url);
    })

    getProductList(url);

    function generateProductList(product) {
        html = '';
        if (typeof product.images == undefined) {
            src_img = product['image_path'] + 'img.jpg';
        } else {
            src_img = product['image_path'] + product['images'][0]['img_url'];
        }
        stars = '';
        rate = Math.round(product['avg_rating']);
        for (i = 1; i <= 5; i++) {
           if (i <= rate) {
               stars += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
           }
           else {
               stars += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
           }
       }

        html += '<div class="col-md-4 top_brand_left">\
                    <div class="hover14 column">\
                        <div class="agile_top_brand_left_grid">\
                            <div class="agile_top_brand_left_grid_pos">\
                                <img src="/images/Example/offer.png" alt=" " class="img-responsive">\
                            </div>\
                            <div class="agile_top_brand_left_grid1">\
                            <figure>\
                                <div class="snipcart-item block">\
                                  <div class="snipcart-thumb">\
                                    <a href="single.html"><img title=" " alt=" " src="'+ src_img +'"></a>\
                                    <p>'+ product['name'] +'</p>\
                                    <div class="stars">' + stars + '</div>\
                                    <h4>'+ product['price_formated'] +'</h4>\
                                  </div>\
                                </div>\
                            </figure>\
                            <div class="detail-link">\
                                <a href="" class="btn btn-warning">Details</a>\
                            </div>\
                        </div>\
                    </div>\
                </div>';
        $('#product-list').append(html);
    }

    $('#next').click(function (event) {
        event.preventDefault();
        url_next = $('#next').attr('href');
        getProductList(url_next);
    })

    function getProductList(url) {
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                if (response.result.paginator['next_page_url'] != null) {
                    $('#next').attr('href', response.result.paginator['next_page_url']);
                } else {
                    $('#next').hide();
                }
                response.result.data.forEach(product => {
                    generateProductList(product);
                });
            }
        });
    }
});


// <div class="col-md-4 top_brand_left">
// <div class="hover14 column">
// <div class="agile_top_brand_left_grid">
// <div class="agile_top_brand_left_grid_pos">
// <img src="" alt=" " class="img-responsive">
// </div>
// <div class="agile_top_brand_left_grid1">
// <figure>
// <div class="snipcart-item block">
//   <div class="snipcart-thumb">
//     <a href="single.html"><img title=" " alt=" " src="/images/Example/3.png"></a>
//     <p>Sampann-toor-dal</p>
//     <h4>$35.99 <span>$55.00</span></h4>
//   </div>
//
// </div>
// </figure>
// </div>
// </div>
// </div>
// </div>

// <div class="snipcart-details top_brand_home_details">
//   <form action="#" method="post">
//     <fieldset>
//       <input type="hidden" name="cmd" value="_cart">
//       <input type="hidden" name="add" value="1">
//       <input type="hidden" name="business" value=" ">
//       <input type="hidden" name="item_name" value="Fortune Sunflower Oil">
//       <input type="hidden" name="amount" value="35.99">
//       <input type="hidden" name="discount_amount" value="1.00">
//       <input type="hidden" name="currency_code" value="USD">
//       <input type="hidden" name="return" value=" ">
//       <input type="hidden" name="cancel_return" value=" ">
//       <input type="submit" name="submit" value="Add to cart" class="button">
//     </fieldset>
//   </form>
// </div>
