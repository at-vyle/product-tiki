function loadPage () {
    $.ajax({
        url: "/api" + window.location.pathname,
        type: "get",
        success: function( response ) {
            imagePath = response.result.image_path;

            imagePri = '<img id="example" src="' + imagePath + response.result.images[0].img_url + '" alt=" " class="img-responsive">';
            $('.agileinfo_single .col-md-4 .agileinfo_single_left').append(imagePri);

            response.result.images.forEach(image => {
                imageSub = '<li class="col-md-4 sub-images-item"><div><img id="example" src="' + imagePath + image.img_url + '" alt=" " class="img-responsive"></div></li>';
                $('.sub-images .sub-images-list').append(imageSub);
            });

            $('.agileinfo_single .agileinfo_single_right h2').append(response.result.name);
            $('.agileinfo_single .agileinfo_single_right .w3agile_description p').append(response.result.description);
            $('.agileinfo_single .agileinfo_single_right .agileinfo_single_right_snipcart h4').append(response.result.price_formated + '<span></span>');

            $(".agileinfo_single_right .agileinfo_single_right_details input[name='item_name']").attr('value', response.result.name);
            $(".agileinfo_single_right .agileinfo_single_right_details input[name='amount']").attr('value', response.result.price);
        }
    });
}
loadPage();

