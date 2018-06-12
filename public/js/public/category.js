$.ajax({
    url: "/api/categories",
    type: "get",
    success: function( result ) {
        let html = '';
        result.result.forEach(category => {
            let childsHtml = '';
            if (category.children) {
                category.children.forEach(childsCategory => {
                    childsHtml += '<li><a href="#">'+ childsCategory.name +'</a></li>';
                });
            }
            
            html += '<li class="dropdown">\
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">' + category.name + '<b class="caret"></b></a>\
                        <ul class="dropdown-menu multi-column columns-3">\
                            <div class="row">\
                                <div class="multi-gd-img">\
                                    <ul class="multi-column-dropdown">\
                                        <h6>' + category.name + '</h6>\
                                        '+ childsHtml +'\
                                    </ul>\
                                </div>\
                            </div>\
                        </ul>\
                    </li>';
        });
        $('.navbar-nav').append(html);
    }
 });
