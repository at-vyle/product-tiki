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

#### Query Param
| Key | Value | Description |
|---|---|---|

##### Example
| URL | Description |
|---|---|
| /api/profile | Get profile of user |


#### Response
```json
{
    "result": [
        {
            "id": 1,
            "category_id": 24,
            "name": "Liliana Bruen V",
            "description": "Repudiandae qui et ea rerum itaque. Eum quia dolores repellendus. Sed voluptatem voluptatem soluta in doloremque ad amet. Hic officia commodi nobis ipsam cupiditate ex. Dolores qui iusto tempore et. Harum maxime pariatur magni. Voluptate adipisci quia fugiat eius alias. Aut temporibus autem aut facilis dolor dolores officia voluptatem. Enim animi error voluptas excepturi fugit. Omnis saepe illo velit consequatur totam et rerum. Esse eius placeat dolores quis odio odit accusantium.",
            "total_rate": 5,
            "rate_count": 2,
            "avg_rating": 2.5,
            "price": 7474311,
            "quantity": 46,
            "status": 1,
            "created_at": "2018-06-08 08:45:48",
            "updated_at": "2018-06-08 08:45:48",
            "deleted_at": null,
            "price_formated": "7,474,311",
            "image_path": "http://192.168.33.10/images/upload/",
            "category": [
                {
                "id": 24,
                "parent_id": 5,
                "name": "Dr. Jared Hand Sr.",
                "level": 1,
                "created_at": "2018-06-08 08:45:48",
                "updated_at": "2018-06-08 08:45:48",
                "deleted_at": null,
                }
            ],
            "images": [
                {
                "id": 6,
                "product_id": 1,
                "img_url": "img.jpg",
                "created_at": "2018-06-08 08:45:50",
                "updated_at": "2018-06-08 08:45:50",
                },
                {
                "id": 31,
                "product_id": 1,
                "img_url": "img.jpg",
                "created_at": "2018-06-08 08:45:50",
                "updated_at": "2018-06-08 08:45:50",
                }
            ],
        }
    ],
    "code": 200
}
```
