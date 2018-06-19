function getUserPosts(url = '/api/posts') {
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
            html = '';
            htmlParent = '';
            if (response.result.paginator['next_page_url'] != null) {
                $('#next').show();
                $('#next').attr('href', response.result.paginator['next_page_url']);
            } else {
                $('#next').hide();
            }
            response.result.data.forEach(posts => {
                let content = posts.content;
                let createdAt = posts.created_at;
                let updatedAt = posts.updated_at;
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
                html += '<tr>\
                            <td class="col-md-10">' + content + '</td>\
                            <td class="col-md-2">' + createdAt + '</td>\
                            <td class="col-md-2">' + updatedAt + '</td>\
                            <td class="col-md-2">' + status + '</td>\
                            <td class="col-md-2">' + type + '</td>\
                        </tr>';   
            });
            htmlParent += '<table class="table-post data table table-striped no-margin">\
                        <thead>\
                            <tr>\
                                <th class="col-md-10">Content</th>\
                                <th class="col-md-2">Created_at</th>\
                                <th class="col-md-2">Updated_at</th>\
                                <th class="col-md-2">Status</th>\
                                <th class="col-md-2">Type</th>\
                            </tr>\
                        </thead>\
                        <tbody>' + html + '</tbody>\
                    </table>';
            $('#table-content').html(htmlParent);   
        }
    });
}

$('#next').click(function (event) {
    event.preventDefault();
    url_next = $('#next').attr('href');
    getUserPosts(url_next);
})
