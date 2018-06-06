## Category Api

### `GET` Categories
```
/api/categories
```
Get list all categories with child categories
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
            "parent_id": null,
            "name": "Alfreda Purdy Jr.",
            "level": 0,
            "created_at": "2018-05-31 07:04:58",
            "updated_at": "2018-05-31 07:04:58",
            "deleted_at": null,
            "child_categories": [
                {
                    "id": 7,
                    "parent_id": 1,
                    "name": "Eulalia Bernhard",
                    "level": 1,
                    "created_at": "2018-05-31 07:04:58",
                    "updated_at": "2018-05-31 07:04:58",
                    "deleted_at": null,
                    "child_categories": [
                        {
                            "id": 18,
                            "parent_id": 7,
                            "name": "Mrs. Taya Prosacco Jr.",
                            "level": 2,
                            "created_at": "2018-05-31 07:04:58",
                            "updated_at": "2018-05-31 07:04:58",
                            "deleted_at": null
                        }, ...
                    ]
                }, ...
            ]
        }, ...
    ],
    "code": 200
}
```
