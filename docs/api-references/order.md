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
        "paginate": {
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

### `POST` Orders
```
/api/orders
```
Create new order
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Query Param
| Param | Type | Description |
|---|---|---|
| products[] | array | List order's products (id, quantity) (require) |

#### Response
* _Success_
```json
{
    "result": {
        "user_id": 1,
        "updated_at": "2018-06-20 08:00:52",
        "created_at": "2018-06-20 08:00:52",
        "id": 26,
        "total": 6,
        "order_details": [
            {
                "id": 18,
                "product_id": 1,
                "order_id": 26,
                "quantity": 3,
                "product_price": 2,
                "created_at": "2018-06-20 08:00:52",
                "updated_at": "2018-06-20 08:00:52",
                "deleted_at": null
            },
            {
                "id": 19,
                "product_id": 1,
                "order_id": 26,
                "quantity": 3,
                "product_price": 2,
                "created_at": "2018-06-20 08:00:52",
                "updated_at": "2018-06-20 08:00:52",
                "deleted_at": null
            }
        ]
    },
    "code": 200
}
```

* _Error_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "products.1.quantity": [
            "The quantity may not be greater than 10."
        ]
    },
    "code": 422,
    "request": {
        "product": [
            {
                "id": "1",
                "price": "2",
                "quantity": "3"
            },
            {
                "id": "1",
                "price": "2",
                "quantity": "321321"
            }
        ]
    }
}
```
### `PUT` Orders
```
api/users/orders/{order}/cancel
```
cancel order
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Query Param
| Key | Value | Description |
|---|---|---|
| order | int | id of Order (require) |

#### Response
```json
{
    "result": {
        "id": 2,
        "user_id": 1,
        "total": 89353521,
        "status": 3,
        "note": "Ut accusantium est sunt quis et. Unde et voluptas aut possimus. Architecto perferendis voluptas molestias. Officia in deleniti et quae. Qui laudantium architecto consequatur non ducimus eligendi. Quia voluptates doloremque sed architecto earum temporibus repellat. Laborum et natus nulla velit repellendus ipsam. Incidunt et et nihil iusto et qui. Dolore sint vel autem repellat qui reprehenderit.",
        "created_at": "2018-06-25 09:31:29",
        "updated_at": "2018-06-27 02:25:18",
        "deleted_at": null
    },
    "code": 200
}
```