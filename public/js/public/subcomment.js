$(document).ready(function(data) {
    $('#posts-list .item').data.forEach($comments => {
        let url = comments.image_path;
        let image = comments.user.user_info.avatar;
        let name = comments.user.user_info.full_name;
        let content = comments.content;
        $id = $(this).data('id').val();
        $.ajax({
            url: '/api/posts/'+ $id + '/comments',
            type: 'get',
            success: function(data) {
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
            $('#posts-list .item .product-col-2 .replies').append(html); 
            }
        });
    });
});
