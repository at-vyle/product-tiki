## Product Detail Api

### `GET` Detail Product
```
/api/products/{product}
```
Get item product
#### Request Headers
| Key | Value | 
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| product | int | Id of Product |

##### Example
| URL | Description |
|---|---|
| /api/products/1 | Get Details Of Products |


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
            "categories": [
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
            "order_detail": [
                {
                "id": 8,
                "product_id": 1,
                "order_id": 3,
                "quantity": 5,
                "product_price": 7474311,
                "created_at": "2018-06-08 08:45:50",
                "updated_at": "2018-06-08 08:45:50",
                "deleted_at": null,
                }
            ]
        }
    ],
    "code": 200
}
```
