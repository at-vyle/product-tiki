## Order Api

### `GET` Orders
```
/api/orders
```
Get list all user's order
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://192.168.21.12/api/orders?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://192.168.21.12/api/orders?page=2",
            "next_page_url": "http://192.168.21.12/api/orders?page=2",
            "path": "http://192.168.21.12/api/orders",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 10
        },
        "data": [
            {
                "id": 1,
                "user_id": 1,
                "total": 1,
                "status": 1,
                "created_at": "2018-05-31 07:04:58",
                "updated_at": "2018-05-31 07:04:58",
                "deleted_at": null,
                "order_details_count": 1,
                "user": {
                    "id": 1,
                    "username": "kyran",
                    "email": "cronin.kimberly@example.net",
                    "is_active": 1,
                    "role": 1,
                    "last_logined_at": "2018-05-31 07:04:58",
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null
                }  
            }
        ]
    },
    "code": 200
}
```
