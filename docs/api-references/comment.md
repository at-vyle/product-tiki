## Comment Api

### `GET` Comments
```
/api/posts/{post}/comments
```
Get list all product's comments
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Param | Type | Description |
|---|---|---|
| post | int | Get comments's post (require) |
| perpage | int | number item per page |
| page | int | paginate comments |

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://product.tiki/api/posts/1/comments?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://product.tiki/api/posts/1/comments?page=2",
            "next_page_url": "http://product.tiki/api/posts/1/comments?page=2",
            "path": "http://product.tiki/api/posts/1/comments",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 7
        },
        "data": [
            {
                "id": 1,
                "user_id": 1,
                "post_id": 1,
                "content": "Voluptate doloremque rerum dignissimos dolores rerum. Blanditiis et qui sit ea nobis rem. Qui ullam aut aut a fugit aut.",
                "diff_time": "1 day ago",
                "image_path": "http://product-tiki.show/images/upload/",
                "created_at": "2018-05-31 07:04:58",
                "updated_at": "2018-05-31 07:04:58",
                "deleted_at": null,
                "user": [
                    {
                        "id": 1,
                        "username": "cloud",
                        "email": "cloud@gmail.com",
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
                                "full_name": "Kiehn Bony",
                                "avatar": "img.jpg",
                                "gender": 1,
                                "dob": "1986-10-05",
                                "address": "4000 Fredrick Suite 861\nSchmidtton, NC 00074-0123",
                                "phone": "+1.743.999.1234",
                                "identity_card": "147111435",
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

### `POST` Comments
```
/api/posts/{post}/comments
```
Create new comment
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token


#### Query Param
| Param | Type | Description |
|---|---|---|
|content| string | required
|post | id | post's id
#### Response
* _Success_
``` json
{
    "result": {
        "content": "dasdasd",
        "user_id": 1,
        "post_id": 3,
        "updated_at": "2018-06-22 08:18:56",
        "created_at": "2018-06-22 08:18:56",
        "id": 51,
        "user": {
            "id": 1,
            "username": "mitchell79",
            "email": "schultz.maynard@example.net",
            "old_password": "",
            "is_active": 0,
            "role": 0,
            "last_logined_at": null,
            "created_at": "2018-06-18 06:23:42",
            "updated_at": "2018-06-18 06:23:42",
            "deleted_at": null,
            "userinfo": {
                "id": 7,
                "user_id": 1,
                "full_name": "Lenny Labadie",
                "avatar": "1529468557-wuOww8L4.jpg",
                "gender": 1,
                "dob": "1994-01-12",
                "address": "1231 sjhdkshdaksh",
                "phone": "1234567890",
                "identity_card": "145789866",
                "created_at": "2018-06-18 06:23:52",
                "updated_at": "2018-06-20 04:22:37"
            }
        }
    },
    "code": 200
}
```
* _Errors_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "content": [
            "The content field is required."
        ]
    },
    "code": 422,
    "request": []
}
```

### `PUT` Update comment
```
/api/comments/{comments}
```
Update comment

#### Request headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Request body

| Key | Type | Description |
|---|---|---|
| comment | int | required |

#### Response
``` json
{
    "result": {
        "content": "dasdasd",
        "user_id": 1,
        "post_id": 3,
        "updated_at": "2018-06-22 08:18:56",
        "created_at": "2018-06-22 08:18:56",
        "id": 51,
        "user": {
            "id": 1,
            "username": "mitchell79",
            "email": "schultz.maynard@example.net",
            "old_password": "",
            "is_active": 0,
            "role": 0,
            "last_logined_at": null,
            "created_at": "2018-06-18 06:23:42",
            "updated_at": "2018-06-18 06:23:42",
            "deleted_at": null,
            "userinfo": {
                "id": 7,
                "user_id": 1,
                "full_name": "Lenny Labadie",
                "avatar": "1529468557-wuOww8L4.jpg",
                "gender": 1,
                "dob": "1994-01-12",
                "address": "1231 sjhdkshdaksh",
                "phone": "1234567890",
                "identity_card": "145789866",
                "created_at": "2018-06-18 06:23:52",
                "updated_at": "2018-06-20 04:22:37"
            }
        }
    },
    "code": 200
}
```

### `DELETE` Delete comments
```
/api/commets/{comments}
```
Delete comments

#### Request headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Request body

| Key | Type | Description |
|---|---|---|
| comments | int | required |

#### Response
``` json
{
    "result": {
        "content": "dasdasd",
        "user_id": 1,
        "post_id": 3,
        "updated_at": "2018-06-22 08:18:56",
        "created_at": "2018-06-22 08:18:56",
        "id": 51,
        "user": {
            "id": 1,
            "username": "mitchell79",
            "email": "schultz.maynard@example.net",
            "old_password": "",
            "is_active": 0,
            "role": 0,
            "last_logined_at": null,
            "created_at": "2018-06-18 06:23:42",
            "updated_at": "2018-06-18 06:23:42",
            "deleted_at": null,
            "userinfo": {
                "id": 7,
                "user_id": 1,
                "full_name": "Lenny Labadie",
                "avatar": "1529468557-wuOww8L4.jpg",
                "gender": 1,
                "dob": "1994-01-12",
                "address": "1231 sjhdkshdaksh",
                "phone": "1234567890",
                "identity_card": "145789866",
                "created_at": "2018-06-18 06:23:52",
                "updated_at": "2018-06-20 04:22:37"
            }
        }
    },
    "code": 200
}
```
