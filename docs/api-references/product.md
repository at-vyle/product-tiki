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

#### Request Headers
| Key | Value | Description |
|---|---|---|
| limit | number | Top Product |
| category | int | Get Products By Category |
| sort | string | Sort Product |
| sort_type | string | Top New Product, Top Rating Product, Top Selling Product 'selling = order_detail(Sum(quantity))' of product |

##### Example
| URL | Description |
|---|---|
| /api/products?sort=created_at&limit=9 | Get Top 9 New Products |
| /api/products?sort=avg_rating&limit=9 | Get Top 9 Rating Products |
| /api/products?sort=selling&limit=4 | Get Top 4 Selling Products |
| /api/products?category=1 | Get Products By Category  |

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
            "categories": [
                {
                    "id": 11,
                    "parent_id": 3,
                    "name": "Dr. Citlalli Berge I",
                    "level": 1,
                    "created_at": "2018-05-30 07:37:34",
                    "updated_at": "2018-05-30 07:37:34",
                    "deleted_at": null,
                }
            ],
            "images": [
                {
                    "id": 41,
                    "product_id": 1,
                    "img_url": "img.jpg",
                    "created_at": "2018-05-30 07:37:36",
                    "updated_at": "2018-05-30 07:37:36",
                }
            ],
            "order_detail": [
                {
                    "id": 2,
                    "product_id": 1,
                    "order_id": 8,
                    "quantity": 10,
                    "product_price": 5462485,
                    "created_at": "2018-05-30 07:37:35",
                    "updated_at": "2018-05-30 07:37:35",
                    "deleted_at": null,
                }
            ],
        }
    ],
    "code": 200
}
```
