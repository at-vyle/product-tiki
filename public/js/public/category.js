$.ajax({
    url: "/api/categories",
    type: "get",
    data: {
    },
    success: function( result ) {
        let html = '';
        
        result.result.forEach(category => {
            if (category.child_categories) {
                let childsHtml = '';
                category.child_categories.forEach(childsCategory => {
                    childsHtml += '<li><a href="household.html">'+ childsCategory.name +'</a></li>';
                });
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
            }
        });
        document.getElementsByClassName('navbar-nav')[0].innerHTML += html;
    }
 });
