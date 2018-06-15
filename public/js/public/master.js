$(document).ready(function () {
    $('#product-search').on('submit', function (event) {
        event.preventDefault();
        query = $('#product-search').find('input[name="name"]').val();
        url = api.products_index + "?name=" + query;
        window.location.href = url;
    });
});
