$.ajax({
    url: '/api/products?sortBy=quantity_sold&perpage=9',
    type: 'get',
    success: function(response) {
        let html = '';
        response.result.data.forEach(product => {
            let stars = '';
            let productsUri = '/products/';
            let id = product.id;
            let imagePath = product.image_path;
            let image = product.images[0]['img_url'];
            let name = product.name;
            let priceFormated = product.price_formated;
            let rate = Math.round(product.avg_rating);
            for (i=1; i<= 5; i++) {
                if (i <= rate) {
                    stars += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                }
                else {
                    stars += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
                }
            }
            html+='<div class="col-md-4 top_brand_left">'+
                        '<div class="hover14 column">'+
                            '<div class="agile_top_brand_left_grid">'+
                                '<div class="agile_top_brand_left_grid_pos">'+
                                '</div>'+
                                '<div class="agile_top_brand_left_grid1">'+
                                '<figure>'+
                                    '<div class="snipcart-item block" >'+
                                    '<div class="snipcart-thumb">'+
                                        '<a href="#"><img title=" " alt=" " src="' + imagePath + image + '" /></a>'+  
                                        '<p>'+ name +'</p>'+
                                        '<div class="stars">' + stars + '</div>'+
                                        '<h4>$'+ priceFormated +'<span></span></h4>'+
                                    '</div>'+
                                    '<div class="snipcart-details top_brand_home_details">'+
                                        '<a href="' + productsUri + id + '">'+
                                            '<input type="submit" name="submit" value="' + Lang.get('user/index.detail') + '" class="button" />'+
                                        '</a>'+
                                    '</div>'+
                                    '</div>'+
                                '</figure>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        });
        $('#expeditions .agile_top_brands_grids').append(html);
    }
});
$.ajax({
    url: '/api/products?sortBy=avg_rating&perpage=9',
    type: 'get',
    success: function(response) {
        let html = '';
        response.result.data.forEach(product => {
            let stars = '';
            let productsUri = '/products/';
            let id = product.id;
            let imagePath = product.image_path;
            let image = product.images[0]['img_url'];
            let name = product.name;
            let priceFormated = product.price_formated;
            let rate = Math.round(product.avg_rating);
            for (i=1; i<= 5; i++) {
                if (i <= rate) {
                    stars += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                }
                else {
                    stars += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
                }
            }
            html+='<div class="col-md-4 top_brand_left">'+
                        '<div class="hover14 column">'+
                            '<div class="agile_top_brand_left_grid">'+
                                '<div class="agile_top_brand_left_grid_pos">'+
                                '</div>'+
                                '<div class="agile_top_brand_left_grid1">'+
                                '<figure>'+
                                    '<div class="snipcart-item block" >'+
                                    '<div class="snipcart-thumb">'+
                                        '<a href="#"><img title=" " alt=" " src="'+ imagePath + image + '" /></a>'+  
                                        '<p>'+ name +'</p>'+
                                        '<div class="stars">' + stars + '</div>'+
                                        '<h4>$'+ priceFormated +'<span></span></h4>'+
                                    '</div>'+
                                    '<div class="snipcart-details top_brand_home_details">'+
                                        '<a href="' + productsUri + id + '">'+
                                            '<input type="submit" name="submit" value="' + Lang.get('user/index.detail') + '" class="button" />'+
                                        '</a>'+
                                    '</div>'+
                                    '</div>'+
                                '</figure>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        });
        $('#tours .agile_top_brands_grids').append(html);
    }
});
$.ajax({
    url: '/api/products?sortBy=created_at&perpage=4',
    type: 'get',
    success: function(response) {
        let html = '';
        response.result.data.forEach(product => {
            let stars = '';
            let productsUri = '/products/';
            let id = product.id;
            let imagePath = product.image_path;
            let image = product.images[0]['img_url'];
            let name = product.name;
            let priceFormated = product.price_formated;
            let rate = Math.round(product.avg_rating);
            for (i=1; i<= 5; i++) {
                if (i <= rate) {
                    stars += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                }
                else {
                    stars += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
                }
            }
            html+='<div class="col-md-3 top_brand_left">'+
                        '<div class="hover14 column">'+
                            '<div class="agile_top_brand_left_grid">'+
                                '<div class="agile_top_brand_left_grid_pos">'+
                                    '<img src="/images/Example/new.png" alt=" " class="img-responsive" />'+
                                '</div>'+
                                '<div class="agile_top_brand_left_grid1">'+
                                '<figure>'+
                                    '<div class="snipcart-item block" >'+
                                    '<div class="snipcart-thumb">'+
                                        '<a href="#"><img title=" " alt=" " src="' + imagePath + image + '" /></a>'+  
                                        '<p>'+ name +'</p>'+
                                        '<div class="stars">' + stars + '</div>'+
                                        '<h4>$'+ priceFormated +'<span></span></h4>'+
                                    '</div>'+
                                    '<div class="snipcart-details top_brand_home_details">'+
                                        '<a href="' + productsUri + id + '">'+
                                            '<input type="submit" name="submit" value="' + Lang.get('user/index.detail') + '" class="button" />'+
                                        '</a>'+
                                    '</div>'+
                                    '</div>'+
                                '</figure>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        });
        $('.newproducts-w3agile .agile_top_brands_grids').append(html);
    }
});
