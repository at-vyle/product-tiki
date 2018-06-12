
<?php

return [
    'images_path_users' => '/images/avatar/',
    'page_length' => 10,
    'dir_asc' => 'ASC',
    'dir_desc' => 'DESC',
    'product' => [
        'limit_rows' => 5,
        'upload_image_url' => 'images/upload/',
        'limit_item' => 9,
    ],
    'post' => [
        'limit_rows' => 5,
        'sort_product_name' => 'name',
        'sort_username' => 'username',
    ],
    'category' => [
        'limit_rows' => 10,
        'sort_by_name' => 'name',
        'sort_by_products_count' => 'products_count',
    ],
    'order' => [
        'limit_rows' => 5,
        'sort_orderdetails_count' => 'orderdetails_count',
        'sort_total' => 'total'
    ],
    'dir_desc' => 'DESC',
    'dir_asc' => 'ASC',
    'homepage' => [
        'numberOfRecords' => '5',
        'time' => [
            'month' => 'month',
            'year' => 'year',
            'week' => 'week'
        ],
        'type' => [
            'user' => 'user',
            'order' => 'order'
        ],
        'request' => [
            'time' => [
                'month' => 'last month',
                'year' => 'last year',
                'week' => 'last week',
                'all' => 'all'
            ]
        ]
    ]
];
