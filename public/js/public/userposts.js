var url ='/api/posts';
function getUserPosts(url) {
    accessToken = localStorage.getItem('login-token');
    $.ajax({
        url: url,
        type: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + accessToken,
        },
        success: function(response) {
            const TYPE_REVIEW = 1;
            const TYPE_COMMENT = 2;
            const STATUS_POST_APPROVED = 1;
            const STATUS_POST_WAITING = 0;
            if (response.result.paginator['next_page_url'] != null) {
                $('#next').show();
                $('#next').attr('href', response.result.paginator['next_page_url']);
            } else {
                $('#next').hide();
            }
            response.result.data.forEach(posts => {
                let content = posts.content;
                let nameProduct = posts.product.name;
                let status = '';
                if (posts.status == STATUS_POST_APPROVED) {
                    status = '<button class="btn btn-success" disabled="disabled"><i class="fa fa-times-circle icon-size"></i>';
                } else {
                    status = '<button class="btn btn-danger" disabled="disabled"><i class="fa fa-check-circle icon-size"></i>';
                }
                let type = '';
                if (posts.type == TYPE_REVIEW) {
                    type = "Review";
                } else {
                    type = "Comment";
                }
                let idpost="comt-"+posts.id;
                $('#template-post').clone().attr({"style":"display: ","id":idpost}).insertBefore('#template-post');
                $("#"+idpost +" .content").text(content);
                $("#"+idpost +" .prduct-name").text(nameProduct);
                $("#"+idpost +" .status").html(status);
                $("#"+idpost +" .type").text(type);
                $("#"+idpost +" .subcomment").html('<button id="button_comment' + posts.id +'" onclick="getComments(' + posts.id +')" class="show-comment btn btn-primary">SubComment</button>');
                
                $('#replies').clone().attr({"id":"replies-"+posts.id}).insertAfter('#'+idpost);
            });
        }
    });
}

function getComments(id) {
    $('#button_comment'+id).attr('disabled', true);
    $.ajax({
        url: '/api/posts/'+ id + '/comments',
        type: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + accessToken,
        },
        success: function(response) {
            response.result.data.forEach(comments => {
                let name = comments.user.user_info.full_name;
                let content = comments.content;
                $('#replies-' + id).clone().attr({'style':'display:',"id":"replies-sub"+comments.id}).insertAfter('#comt-'+id);
                $('#replies-sub'+ comments.id ).show();
                $('#replies-sub' + comments.id + ' .replies-content').text(content);
                $('#replies-sub' + comments.id + ' .replies-fullname').text(name);  
            });
        }
    })
}

getUserPosts(url);
$('#next').click(function (event) {
    event.preventDefault();
    url_next = $('#next').attr('href');
    getUserPosts(url_next);
})
