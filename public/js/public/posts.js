var $url = document.location.pathname;
function generatePosts(data) {
    html = '';
    data.forEach(posts => {
        let image = posts.user.user_info.avatar;
        let name = posts.user.user_info.full_name;
        let stars = '';
        if (posts.type == 1) {
            let rate = Math.round(posts.rating);
            for(i=1; i<= 5; i++){
                if(i <= rate) {
                    stars += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                }
                else {
                    stars += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
                }
            }
        }
        html += '<div class="item" itemprop="review" itemtype="http://schema.org/Review">'+
                    '<div class="product-col-1 col-md-2">'+
                        '<p class="image">'+
                            '<img src="/images/avatar/' + image + '">'+
                        '</p>'+
                        '<p class="name user-info" itemprop="author">'+ name +'</p>'+
                        '<p class="diff_time">'+ posts.diff_time +'</p>'+
                    '</div>'+
                    '<div class="product-col-2 col-md-10">'+
                        '<div class="infomation">'+
                            '<span class="starRating">'+ stars +'</span>'+
                        '</div>'+
                        
                        '<div class="description js-description">'+
                            '<p class="review_detail replies-text" itemprop="reviewBody">'+
                            '<span>'+ posts.content + '</span>'+
                            '</p>'+
                            '<button type="button" class="btn btn-primary add-comment">'+ Lang.get('user/detail_product.reply') +'</button>'+
                        '</div>'+
                        '<div class="quick-reply">'+
                            '<textarea class="form-control review_comment" placeholder="'+ Lang.get('user/detail_product.placeholder_input') +'" rows="5"></textarea><span class="help-block text-left"></span>'+
                            '<button type="button" class="btn btn-primary btn_add_comment" data-review-id="1105262">'+ Lang.get('user/detail_product.send') +'</button>'+
                            '<button type="button" class="btn btn-default js-quick-reply-hide">'+ Lang.get('user/detail_product.cancel') +'</button>'+
                        '</div>'+
                    '</div>'+
                '</div>';
    });
    $('#posts-list').append(html);
}
// console.log('/api' + $url + '/posts?sortBy=created_at&order=desc&type=1');
function getAjax(url) {
    $.ajax({
        url: url,
        type: "get",
        header: {
            'Accept': 'application/json',
        },
        success: function(response) {
            generatePosts(response.result.data);
        }    
    });
};
getAjax('/api' + $url + '/posts');
$(document).ready(function(){
    $(document).on('click', '#posts-list .item .add-comment', function(){
        $(this).hide();
        $(this).closest('.item').find('.quick-reply').show();
    });
    $(document).on('click', '#posts-list .item .js-quick-reply-hide', function(){
        $(this).closest('.item').find('.quick-reply').hide();
        $(this).closest('.item').find('.add-comment').show();
    })

});
