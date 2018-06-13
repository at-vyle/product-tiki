$.ajax({
    url: '/api/products?sortBy=created_at&perpage=9',
    type: 'get',
    success: function(data) {
        let $html = '';
        data.result.data.forEach(product => {
            let stars = '';
            let rate = Math.round(product.avg_rating);
            for(i=1; i<= 5; i++){
                if(i <= rate) {
                    str += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                }
                else {
                    str += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
                }
            }
            // console.log($.number(product.price));
            console.log(product.images[0]['img_url']);
            $html+='<div class="col-md-4 top_brand_left">'+
                        '<div class="hover14 column">'+
                            '<div class="agile_top_brand_left_grid">'+
                                '<div class="agile_top_brand_left_grid_pos">'+
                                '<img src="/images/Example/offer.png" alt=" " class="img-responsive" />'+
                                '</div>'+
                                '<div class="agile_top_brand_left_grid1">'+
                                '<figure>'+
                                    '<div class="snipcart-item block" >'+
                                    '<div class="snipcart-thumb">'+
                                        '<a href="products.html"><img title=" " alt=" " src="/images/upload/' + product.images[0]['img_url'] + '" /></a>'+  
                                        '<p>'+ product.name +'</p>'+
                                        '<div class="stars">' + str + '</div>'+
                                        '<h4>'+ product.price_formated +'</h4>'+
                                    '</div>'+
                                    '<div class="snipcart-details top_brand_home_details">'+
                                        '<form action="#" method="post">'+
                                        '<fieldset>'+
                                            '<input type="hidden" name="cmd" value="_cart" />'+
                                            '<input type="hidden" name="add" value="1" />'+
                                            '<input type="hidden" name="business" value=" " />'+
                                            '<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />'+
                                            '<input type="hidden" name="amount" value="20.99" />'+
                                            '<input type="hidden" name="discount_amount" value="1.00" />'+
                                            '<input type="hidden" name="currency_code" value="USD" />'+
                                            '<input type="hidden" name="return" value=" " />'+
                                            '<input type="hidden" name="cancel_return" value=" " />'+
                                            '<input type="submit" name="submit" value="Add to cart" class="button" />'+
                                        '</fieldset>'+
                                        '</form>'+
                                    '</div>'+
                                    '</div>'+
                                '</figure>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        });
        $('#myTabContent .agile_top_brands_grids').append($html);
    }
});