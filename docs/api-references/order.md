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
        "data": [
            {
                "id": 1,
                "user_id": 1,
                "total": 1,
                "status": 1,
                "created_at": "2018-05-31 07:04:58",
                "updated_at": "2018-05-31 07:04:58",
                "deleted_at": null,
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
