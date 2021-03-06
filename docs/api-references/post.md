## Post Api

### `GET` Posts
```
/api/products/{product}/posts
```
Get list all product's posts
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Param | Type | Description |
|---|---|---|
| product | int | Get posts by product (require) |
| sortBy | string | Sort posts |
| order | string | Type sort posts |
| status | int | Get posts by status |
| perpage | int | number item per page |
| page | int | paginate posts |

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://product.tiki/api/products/1/posts?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://product.tiki/api/products/1/posts?page=2",
            "next_page_url": "http://product.tiki/api/products/1/posts?page=2",
            "path": "http://product.tiki/api/products/1/posts",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 7
        },
        "data": [
            {
                "id": 1,
                "product_id": 1,
                "user_id": 1,
                "type": 1,
                "content": "Voluptate doloremque rerum dignissimos dolores rerum. Blanditiis et qui sit ea nobis rem. Qui ullam aut aut a fugit aut. Magni voluptatem et ut aut. Sint iusto error quisquam deserunt sit est doloribus magnam. Tempora aliquam optio a. Et illum sapiente omnis sequi consequatur molestiae accusantium distinctio. Aut commodi asperiores perspiciatis ut. Ad sequi velit incidunt tenetur.",
                "rating": 4,
                "status": 1,
                "diff_time": "1 day ago",
                "image_path": "http://product-tiki.show/images/upload/",
                "created_at": "2018-05-31 07:04:58",
                "updated_at": "2018-05-31 07:04:58",
                "deleted_at": null,
                "user": [
                    {
                        "id": 1,
                        "username": "kyran",
                        "email": "cronin.kimberly@example.net",
                        "is_active": 1,
                        "role": 1,
                        "last_logined_at": "2018-05-31 07:04:58",
                        "created_at": "2018-05-31 07:04:58",
                        "updated_at": "2018-05-31 07:04:58",
                        "deleted_at": null,
                        "userinfo": [
                            {
                                "id": 1,
                                "user_id": 1,
                                "full_name": "Ebony Kiehn DDS",
                                "avatar": "img.jpg",
                                "gender": 1,
                                "dob": "1982-04-05",
                                "address": "3489 Fredrick Orchard Suite 861\nSchmidtton, NC 00074-0123",
                                "phone": "+1.743.859.1454",
                                "identity_card": "147621465",
                                "created_at": "2018-06-05 10:12:46",
                                "updated_at": "2018-06-05 10:12:46"
                            }
                        ]
                    }
                ]
            }
        ]
    },
    "code": 200
}
```
### `PUT` Update post
```
/api/posts/{post}
```
Update post with type include review, comment

#### Request headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Request body

| Key | Type | Description |
|---|---|---|
| post | int | required |
| type | int | required (1) |
| content | String | required if rating is null |
| rating | int | required if content is null |

#### Response
```
{
    "data":{
            "id": 1,
            "product_id": 1,
            "user_id": 1,
            "type": 1,
            "content": "Voluptate doloremque rerum dignissimos dolores rerum. Blanditiis et qui sit ea nobis rem. Qui ullam aut aut a fugit aut. Magni voluptatem et ut aut. Sint iusto error quisquam deserunt sit est doloribus magnam. Tempora aliquam optio a. Et illum sapiente omnis sequi consequatur molestiae accusantium distinctio. Aut commodi asperiores perspiciatis ut. Ad sequi velit incidunt tenetur.",
            "rating": 4,
            "status": 1,
            "diff_time": "1 day ago",
            "image_path": "http://product-tiki.show/images/upload/",
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": null,
            "user": [
                {
                    "id": 1,
                    "username": "kyran",
                    "email": "cronin.kimberly@example.net",
                    "is_active": 1,
                    "role": 1,
                    "last_logined_at": "2018-05-31 07:04:58",
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null,
                    "userinfo": [
                        {
                            "id": 1,
                            "user_id": 1,
                            "full_name": "Ebony Kiehn DDS",
                            "avatar": "img.jpg",
                            "gender": 1,
                            "dob": "1982-04-05",
                            "address": "3489 Fredrick Orchard Suite 861\nSchmidtton, NC 00074-0123",
                            "phone": "+1.743.859.1454",
                            "identity_card": "147621465",
                            "created_at": "2018-06-05 10:12:46",
                            "updated_at": "2018-06-05 10:12:46"
                        }
                    ]
                }
            ]
        }
    }
```

### `DELETE` Delete post
```
/api/posts/{post}
```
Update post with type include review, comment

#### Request headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Request body

| Key | Type | Description |
|---|---|---|
| post | int | required |

#### Response
```
{
    "data":{
            "id": 1,
            "product_id": 1,
            "user_id": 1,
            "type": 1,
            "content": "Voluptate doloremque rerum dignissimos dolores rerum. Blanditiis et qui sit ea nobis rem. Qui ullam aut aut a fugit aut. Magni voluptatem et ut aut. Sint iusto error quisquam deserunt sit est doloribus magnam. Tempora aliquam optio a. Et illum sapiente omnis sequi consequatur molestiae accusantium distinctio. Aut commodi asperiores perspiciatis ut. Ad sequi velit incidunt tenetur.",
            "rating": 4,
            "status": 1,
            "diff_time": "1 day ago",
            "image_path": "http://product-tiki.show/images/upload/",
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": "2018-05-31 07:05:58",
            "user": [
                {
                    "id": 1,
                    "username": "kyran",
                    "email": "cronin.kimberly@example.net",
                    "is_active": 1,
                    "role": 1,
                    "last_logined_at": "2018-05-31 07:04:58",
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null,
                    "userinfo": [
                        {
                            "id": 1,
                            "user_id": 1,
                            "full_name": "Ebony Kiehn DDS",
                            "avatar": "img.jpg",
                            "gender": 1,
                            "dob": "1982-04-05",
                            "address": "3489 Fredrick Orchard Suite 861\nSchmidtton, NC 00074-0123",
                            "phone": "+1.743.859.1454",
                            "identity_card": "147621465",
                            "created_at": "2018-06-05 10:12:46",
                            "updated_at": "2018-06-05 10:12:46"
                        }
                    ]
                }
            ]
        }
    }
```

### `POST` Posts
```
/api/products/{product}/posts
```
| Key | Value |
|---|---|
|Accept|application/json
|Authorization| Bearer $token

#### Query Param
| Param | Type | Description |
|---|---|---|
| type | int | Get posts by type |
| rating | int | Get rating of type review|
| content | text | Post's content |

#### Response
* _Success_
``` json
{
    "result": {
        "type": "1",
        "content": "asdasdasdasd",
        "rating": "3",
        "user_id": 17,
        "product_id": 2,
        "updated_at": "2018-06-14 09:26:12",
        "created_at": "2018-06-14 09:26:12",
        "id": 85
    },
    "code": 200
}
```

* _Error_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "type": [
            "The username cannot be greater than 2"
        ],
        "content": [
            "The email is required."
        ]
    },
    "code": 422,
    "request": {
        "type": null,
        "content": null,
    }
}
```

### `GET` Posts of logged in user
```
/api/posts
```
Get list all product's posts
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization| Bearer $token

#### Query Param
| Param | Type | Description |
|---|---|---|
| type | int | Get posts by type |
| status | int | Get posts by status |
| perpage | int | number item per page |
| page | int | paginate posts |

#### Response
* _Success_
``` json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://product.tiki/api/posts?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://product.tiki/api/posts?page=2",
            "next_page_url": "http://product.tiki/api/posts?page=2",
            "path": "http://product.tiki/api/posts",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 7
        },
        "data": [
            {
                "id": 1,
                "product_id": 1,
                "user_id": 1,
                "type": 1,
                "content": "Voluptate doloremque rerum dignissimos dolores rerum. Blanditiis et qui sit ea nobis rem. Qui ullam aut aut a fugit aut. Magni voluptatem et ut aut. Sint iusto error quisquam deserunt sit est doloribus magnam. Tempora aliquam optio a. Et illum sapiente omnis sequi consequatur molestiae accusantium distinctio. Aut commodi asperiores perspiciatis ut. Ad sequi velit incidunt tenetur.",
                "rating": 4,
                "status": 1,
                "created_at": "2018-05-31 07:04:58",
                "updated_at": "2018-05-31 07:04:58",
                "deleted_at": null,
            }
        ]
    },
    "code": 200
}
```
* _Error_
``` json
{
    "error": "Unauthorised",
    "code": 401
}
```
