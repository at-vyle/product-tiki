## Product Api

### `GET` Products
```
/api/products
```
Get list product
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Response
```json
{
    "result": [
            {
            "id": 1,
            "category_id": 11,
            "name": "Alfreda Purdy Jr.",
            "description": "Ipsum sit quod ut. Ea quia architecto rerum consequatur. Hic delectus consequuntur eligendi. Repudiandae consectetur assumenda corrupti sunt nisi. Quidem numquam consequatur dignissimos velit ut quis nemo. Fugiat voluptatem delectus voluptas in. Magni aperiam aut aut ut a. Debitis sunt quod ut minus recusandae rem et. Officiis consequatur error officiis animi consequuntur qui architecto. Voluptas a expedita voluptatibus quam dolores inventore quidem modi.",
            "total_rate": 11,
            "rate_count": 3,
            "avg_rating": 3.7,
            "price": 5462485,
            "quantity": 34,
            "status": 1,
            "created_at": "2018-05-30 07:37:35",
            "updated_at": "2018-06-05 09:42:43",
            "deleted_at": "2018-06-05 09:42:43",
            "categories": {
                "id": 11,
                "parent_id": 3,
                "name": "Dr. Citlalli Berge I",
                "level": 1,
                "created_at": "2018-05-30 07:37:34",
                "updated_at": "2018-05-30 07:37:34",
                "deleted_at": null,
            },
            "images": {
                "id": 16,
                "": ,
            },
        }, ...
    ],
    "code": 200
}
```
