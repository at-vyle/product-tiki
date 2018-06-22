## Detail Order Api

### `GET` Detail Order
```
/api/orders/{order}
```
Get detail order
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
    "result": [
        {
            "id": 1,
            "user_id": 1,
            "total": 9342424,
            "status": 1,
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": null,
            "total_formated": "9,342,424",
            "image_path": "http://product-tiki.show/images/upload/",
            "order_details": [
                {
                    "id": 1,
                    "product_id": 5,
                    "order_id": 1,
                    "quatity": 1,
                    "product_price": 8622478,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null,
                    "price_formated": "8,622,478",
                    "product": [
                        {
                            "id": 5,
                            "category_id": 11,
                            "name": "Alfreda Purdy Jr.",
                            "description": "Ipsum sit quod ut. Ea quia architecto rerum consequatur. Hic delectus consequuntur eligendi. Repudiandae consectetur assumenda corrupti sunt nisi. Quidem numquam consequatur dignissimos velit ut quis nemo. Fugiat voluptatem delectus voluptas in. Magni aperiam aut aut ut a. Debitis sunt quod ut minus recusandae rem et. Officiis consequatur error officiis animi consequuntur qui architecto. Voluptas a expedita voluptatibus quam dolores inventore quidem modi.",
                            "total_rate": 11,
                            "rate_count": 3,
                            "avg_rating": 3.7,
                            "price": 5462485,
                            "quantity": 34,
                            "status": 1,
                            "quantity_sold": "6",
                            "created_at": "2018-05-30 07:37:35",
                            "updated_at": "2018-06-05 09:42:43",
                            "deleted_at": null,
                            "images": [
                                {
                                    "id": 41,
                                    "product_id": 5,
                                    "img_url": "img.jpg",
                                    "created_at": "2018-05-30 07:37:36",
                                    "updated_at": "2018-05-30 07:37:36"
                                }
                            ]   
                        }
                    ] 
                }
            ] 
        }
    ],
    "code": 200
}
```
