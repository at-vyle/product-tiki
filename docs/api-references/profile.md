## Profile User Api

### `GET` Profile User
```
/api/profile
```
Get profile user
#### Request Headers
| Key | Value | 
|---|---|
|Accept|application/json
|Authorization|Bearer $token

##### Example
| URL | Description |
|---|---|
| /api/profile | Get profile of user |


#### Response
```json
{
    "result": [
        {
        "user": {
            "username": "abcde",
            "email": "abc@abc.abcde",
            "created_at": "2018-06-13 09:10:01",
            "updated_at": "2018-06-13 09:10:01",
            "id": 18,
            "image_path": "http://192.168.33.10/images/avatar/",
            "user_info": {
                "id": 14,
                "user_id": 18,
                "full_name": "dsahdkjashd djaskdaskjdh",
                "avatar": "img.jpg",
                "gender": 1,
                "dob": null,
                "address": "1231 sjhdkshdaksh",
                "phone": "1234567890",
                "identity_card": "145789865",
                "created_at": "2018-06-13 09:10:01",
                "updated_at": "2018-06-13 09:10:01"
            }
        },
    "code": 200
}
```
