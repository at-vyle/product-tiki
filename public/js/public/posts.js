var $url = document.location.pathname;
const TYPE_REVIEW = 1;
const TYPE_COMMENT = 2;
function generatePosts(data) {
    html = '';
    data.forEach(posts => {
        let id = posts.id;
        let url = posts.image_path;
        let image = posts.user.user_info.avatar;
        let name = posts.user.user_info.full_name;
        let diffTime = posts.diff_time;
        let content = posts.content;
        let stars = '';
        if (posts.type == TYPE_REVIEW) {
            let rate = Math.round(posts.rating);
            for (i = 1; i <= 5; i++) {
                if (i <= rate) {
                    stars += '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                }
                else {
                    stars += '<i class="fa fa-star black-star" aria-hidden="true"></i>'
                }
            }
        }
        html += '<div class="item posts" data-id="' + id + '" itemprop="review" itemtype="http://schema.org/Review">'+
                    '<div class="product-col-1 col-md-2">'+
                        '<p class="image">'+
                            '<img src="' + url + image + '">'+
                        '</p>'+
                        '<p class="name user-info" itemprop="author">'+ name +'</p>'+
                        '<p class="diff_time">'+ diffTime +'</p>'+
                    '</div>'+
                    '<div class="product-col-2 col-md-10">'+
                        '<div class="infomation">'+
                            '<span class="starRating">'+ stars +'</span>'+
                        '</div>'+

                        '<div class="description js-description">'+
                            '<p class="review_detail replies-text" itemprop="reviewBody">'+
                            '<span>'+ content + '</span>'+
                            '</p>'+
                            '<button type="button" class="btn btn-primary add-comment">'+ Lang.get('user/detail_product.reply') +'</button>'+
                        '</div>'+
                        '<div class="quick-reply">'+
                            '<textarea class="form-control review_comment" placeholder="'+ Lang.get('user/detail_product.placeholder_input') +'" rows="5"></textarea><span class="help-block text-left"></span>'+
                            '<button type="button" class="btn btn-primary btn_add_comment" data-review-id="1105262">'+ Lang.get('user/detail_product.send') +'</button>'+
                            '<button type="button" class="btn btn-default js-quick-reply-hide">'+ Lang.get('user/detail_product.cancel') +'</button>'+
                        '</div>'+
                        '<div id="replies'+id+'"></div>'+
                    '</div>'+
                '</div>';
                getComments(id);
    });
    $('#posts-list').append(html);

}

function getComments(id) {
    $.ajax({
        url: '/api/posts/'+ id + '/comments',
        type: 'get',
        header: {
            'Accept': 'application/json',
        },
        success: function(response) {
            html = '';
            response.result.data.forEach(comments => {
                let url = comments.image_path;
                let image = comments.user.user_info.avatar;
                let name = comments.user.user_info.full_name;
                let content = comments.content;
                html += '<div class="replies-item">\
                            <div class="rep-info-user">\
                                <p class="replies-image rep-custom">\
                                    <img src="'+ url + image +'">\
                                </p>\
                                <p class="replies-name rep-custom">'+ name +'</p>\
                            </div>\
                            <p class="replies-text">\
                                <span>'+ content + '</span>\
                            </p>\
                        </div>';

            });
            $('#replies'+id).append(html);

        }
    })
}

function getAjax(url) {
    $('#posts-list').html('');
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

function submitPost(pathName) {
    let typePost = TYPE_COMMENT;
    if ($('.rating1 .starRating input:checked').val()) {
        typePost = TYPE_REVIEW;
    }

    $.ajax({
        url: '/api' + pathName + '/posts',
        type: 'post',
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('login-token'),
        },
        data: {
            type: typePost,
            rating: $('.rating1 .starRating input:checked').val(),
            content: $('#addReviewFrm .review-content #review_detail').val(),
        },
        success: function(response) {
            $('#addReviewFrm .review-content .alert-info').show();
        },
        error: function(response) {
            errorMessage = response.responseJSON.message + '<br/>';
            if (response.responseJSON.errors) {
                errors = Object.keys(response.responseJSON.errors);
                errors.forEach(error => {
                    errorMessage += response.responseJSON.errors[error] + '<br/>';
                });
            }
            $('#addReviewFrm .review-content .alert-danger').html(errorMessage);
            $('#addReviewFrm .review-content .alert-danger').show();
        }
    });
}

$(document).ready(function() {
    getAjax('/api' + $url + '/posts');
    
    $(document).on('click', '.filter-post .sort-list li', function() {
        $(this).addClass('selected');
        $(this).siblings().removeClass('selected');
        $(this).closest('.filter-post').find('.title').text($(this).text());
    });  

    $(document).on('click', '.sort-type .sort-list li', function() {
        
        if ($(this).text() == 'Review') {
            $('.sort-rating > button').show();
            getAjax('/api' + $url + '/posts?type=' + TYPE_REVIEW);
        }
        else {
            $('.sort-rating > button').hide();
            getAjax('/api' + $url + '/posts?type=' + TYPE_COMMENT);
        };       
   
    });

    $(document).on('click', '.sort-rating .sort-list li', function() {
        $rate = $(this).data('star');
        
        getAjax('/api' + $url + '/posts?rating=' + $rate);
    });

    $(document).on('click', '.rating1 .starRating input', function() {
        if ($(this).attr('checked') == 'checked') {
            $(this).attr('checked', false);
            $(this).siblings().attr('checked', false);
        } else {
            $(this).attr('checked', true);
            $(this).siblings().attr('checked', false);
        }
    });

    $(document).on('click', '#addReviewFrm .action .btn-add-review', function(event) {
        event.preventDefault();
        submitPost($url);
    });

    $(document).on('click', '#posts-list .item .add-comment', function() {
        $(this).hide();
        $(this).closest('.item').find('.quick-reply').show();
    });

    $(document).on('click', '#posts-list .item .js-quick-reply-hide', function() {
        $(this).closest('.item').find('.quick-reply').hide();
        $(this).closest('.item').find('.add-comment').show();
    });
});
