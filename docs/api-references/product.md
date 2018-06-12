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

#### Query Param
| Key | Value | Description |
|---|---|---|
| limit | number | Top Product |
| category | int | Get Products belong to Category |
| sortBy | string | Top New Product, Top Rating Product, Top selling Product 'quantity_sold = order_detail.quantity(Sum(quantity))' of product |
| order | string | Sort Product (ASC, DESC) |
| perpage | int | paginate for page Product |

##### Example
| URL | Description |
|---|---|
| /api/products?sortBy=created_at&limit=9 | Get Top 9 New Products |
| /api/products?sortBy=avg_rating&limit=9 | Get Top 9 Rating Products |
| /api/products?sortBy=selling&limit=4 | Get Top 4 Selling Products |
| /api/products?category=1 | Get Products belong to Category  |
| /api/products?category=1&sortBy=name&order=DESC&perpage=1 | Get Products belong to Category and sort for page |

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://192.168.21.12/api/products?sortBy=selling&page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://192.168.21.12/api/products?sortBy=selling&page=2",
            "next_page_url": "http://192.168.21.12/api/products?sortBy=selling&page=2",
            "path": "http://192.168.21.12/api/products",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 10
        },
        "data": [
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
                "quantity_sold": "6",
                "categories": {
                    "id": 11,
                    "parent_id": 3,
                    "name": "Dr. Citlalli Berge I",
                    "level": 1,
                    "created_at": "2018-05-30 07:37:34",
                    "updated_at": "2018-05-30 07:37:34",
                    "deleted_at": null
                },
                "images": [
                    {
                        "id": 41,
                        "product_id": 1,
                        "img_url": "img.jpg",
                        "created_at": "2018-05-30 07:37:36",
                        "updated_at": "2018-05-30 07:37:36"
                    }
                ]
            }
        ]
    },
    "code": 200
}
```
