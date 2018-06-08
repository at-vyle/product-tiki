## Product Detail Api

### `GET` Detail Product
```
/api/products/id
```
Get item product
#### Request Headers
| Key | Value | 
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| id | number | Id of Product |

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
            ],
            "posts": [
                {
                    "id": 16,
                    "product_id": 1,
                    "user_id": 1,
                    "type": 1,
                    "content": "Cupiditate dicta suscipit ut. Non cupiditate recusandae accusantium tenetur voluptatibus. Recusandae aliquam sit nostrum. Pariatur doloribus perferendis ut explicabo repellendus ex voluptas. Sed sit nulla nemo rerum. Pariatur animi et odio possimus veniam. Et iste deleniti iure libero ea labore. Voluptatem incidunt mollitia voluptatem blanditiis autem vel. Quo dolorum quam ratione ad. Aliquam nemo sit ducimus repellat ut. Sapiente dolore aliquid omnis ut eveniet a fugiat.",
                    "rating": 1,
                    "status": 0,
                    "created_at": "2018-06-08 08:45:48",
                    "updated_at": "2018-06-08 08:45:48",
                    "deleted_at": null,
                    "users": [
                        {
                        "id": 1,
                        "username": "west.jesus",
                        "email": "emmett.zulauf@example.org",
                        "password": "$2y$10$MCq3E96HXzrVCM3JHDJ.4efgJ.B4zifkhrWic4pQ.magH75EZOtzi",
                        "old_password": null,
                        "is_active": 0,
                        "role": 0,
                        "last_logined_at": null,
                        "api_token": null,
                        "remember_token": null,
                        "created_at": "2018-06-08 08:45:47",
                        "updated_at": "2018-06-08 08:45:47",
                        "deleted_at": null,
                        }
                    ],
                },
                {
                    "id": 17,
                    "product_id": 1,
                    "user_id": 3,
                    "type": 1,
                    "content": "Aut deleniti et pariatur distinctio est dolor velit. Est voluptas quis architecto deleniti. Voluptatem aut dolorem impedit cum iste molestiae dolorum et. Optio eligendi magni vel officiis. Repellendus hic voluptas aut voluptatem temporibus accusantium. Laboriosam incidunt fugit dignissimos ipsum. Blanditiis suscipit deleniti iure fugiat facere ipsum soluta.",
                    "rating": 5,
                    "status": 1,
                    "created_at": "2018-06-08 08:45:48",
                    "updated_at": "2018-06-08 08:45:48",
                    "deleted_at": null,
                    "comments": [
                            {
                                "id": 28,
                                "user_id": 1,
                                "post_id": 17,
                                "content": "Perferendis non voluptas mollitia. Dolor magni laboriosam porro praesentium facilis id. Ad aperiam officiis ad repellendus. Sequi repudiandae unde ut et est quo. Cum ab voluptatum ut sit. Nisi quasi non cupiditate sapiente aliquid. Qui est unde beatae et voluptates facilis. Eos et doloremque culpa suscipit non praesentium. Quidem est est voluptatibus beatae sit quis et praesentium. Quia et excepturi eaque officia nihil omnis.",
                                "created_at": "2018-06-08 08:45:49",
                                "updated_at": "2018-06-08 08:45:49",
                                "deleted_at": null,
                            }
                        ],
                    "users": [
                        {
                        "id": 3,
                        "username": "wehner.gaston",
                        "email": "camylle83@example.org",
                        "password": "$2y$10$imeFPSbKHd8uRb6KFfLQB.6ZDy.l.DsP4k2/goXbhxmFHJiitIWVu",
                        "old_password": null,
                        "is_active": 0,
                        "role": 0,
                        "last_logined_at": null,
                        "api_token": null,
                        "remember_token": null,
                        "created_at": "2018-06-08 08:45:47",
                        "updated_at": "2018-06-08 08:45:47",
                        "deleted_at": null,
                        }
                    ],
                },
                {
                    "id": 33,
                    "product_id": 1,
                    "user_id": 7,
                    "type": 1,
                    "content": "Quod aliquam doloremque porro consequatur. Neque et et consequatur exercitationem. Possimus nemo saepe et sed eveniet impedit et aliquid. Iste hic doloremque sapiente consequatur rerum est autem non. Distinctio atque eos et sed enim porro consequatur debitis. At voluptas tempora optio sunt dolor perferendis. Qui omnis quis dolore corporis quam qui. Dolore vel in nihil sint maxime. Molestiae qui nesciunt accusamus nulla dolores reprehenderit.",
                    "rating": 5,
                    "status": 1,
                    "created_at": "2018-06-08 08:45:48",
                    "updated_at": "2018-06-08 08:45:48",
                    "deleted_at": null,
                    "comments": [
                        {
                            "id": 20,
                            "user_id": 9,
                            "post_id": 33,
                            "content": "Numquam ut pariatur temporibus maiores non tempora rerum. Fuga quaerat labore consequuntur aut illo. Exercitationem voluptatem dolor inventore consequatur amet nostrum enim voluptatem. Enim deleniti deserunt voluptates tenetur. Est corrupti consequatur voluptas quia eum aut a. Omnis veritatis qui quo nam corporis eum voluptatum doloribus. Accusantium sit aspernatur est sequi tenetur consequatur. Ut omnis quod at explicabo similique nulla. Qui sit et voluptas quos qui dolore.",
                            "created_at": "2018-06-08 08:45:49",
                            "updated_at": "2018-06-08 08:45:49",
                            "deleted_at": null,
                        },
                        {
                            "id": 27,
                            "user_id": 4,
                            "post_id": 33,
                            "content": "Consequatur at beatae qui consequatur aperiam soluta qui. Itaque facere et veritatis consectetur libero dolorem. Eius ex exercitationem asperiores explicabo qui inventore et. Voluptatem eum temporibus iusto corporis. Qui occaecati iure id. Molestiae eum dolorem ea est. Eaque repellat et sit velit delectus quas. Ut sunt autem sint repellendus ipsum ut et. Quis dolorem voluptas commodi et perferendis vel.",
                            "created_at": "2018-06-08 08:45:49",
                            "updated_at": "2018-06-08 08:45:49",
                            "deleted_at": null,
                        },
                        {
                            "id": 36,
                            "user_id": 5,
                            "post_id": 33,
                            "content": "Nemo reiciendis nostrum excepturi. Eligendi praesentium sequi cupiditate autem et itaque quo. Neque repellendus sint recusandae quia eius minus. Molestiae iure assumenda explicabo molestias cupiditate. Ut non asperiores voluptatem consequatur impedit maxime. At necessitatibus cupiditate assumenda enim rerum ut. Quis mollitia dolorum minus ut dolor vitae incidunt veniam.",
                            "created_at": "2018-06-08 08:45:49",
                            "updated_at": "2018-06-08 08:45:49",
                            "deleted_at": null,
                        },
                    ],
                    "users": [
                        {
                        "id": 7,
                        "username": "wunsch.dedrick",
                        "email": "nova95@example.org",
                        "password": "$2y$10$iWYdmCRVGkLZQ2OLjXa87u95MVmjlHM2UCiIACCNwR6qthZHIKkYy",
                        "old_password": null,
                        "is_active": 0,
                        "role": 0,
                        "last_logined_at": null,
                        "api_token": null,
                        "remember_token": null,
                        "created_at": "2018-06-08 08:45:47",
                        "updated_at": "2018-06-08 08:45:47",
                        "deleted_at": null,
                        }
                    ],
                },
                {
                    "id": 54,
                    "product_id": 1,
                    "user_id": 11,
                    "type": 2,
                    "content": "Ad ex accusantium magni mollitia. Nesciunt doloremque ratione qui deserunt sint. In explicabo nihil iusto aperiam nemo. Assumenda vero nulla maiores eveniet aspernatur. Quia id animi est minus sapiente provident quia. Quia numquam beatae eum est et voluptatem possimus. In ea velit qui perspiciatis. Eum voluptas eveniet amet neque adipisci aut. Quasi optio minus eos nisi.",
                    "rating": null,
                    "status": 1,
                    "created_at": "2018-06-08 08:45:48",
                    "updated_at": "2018-06-08 08:45:48",
                    "deleted_at": null,
                    "comments": [
                        {
                            "id": 33,
                            "user_id": 1,
                            "post_id": 54,
                            "content": "Similique totam corporis sit. Quia repellendus fugit rerum minus. Quae qui eaque molestiae consequatur illo cum. Dolorum id molestiae quam aperiam alias consequuntur distinctio. Recusandae aut facere quia voluptatem voluptas dolorem ducimus voluptas. Sint voluptas soluta qui deserunt reiciendis hic eos. Quae maxime repellat iure ut. Deleniti in omnis ad et rerum dignissimos.",
                            "created_at": "2018-06-08 08:45:49",
                            "updated_at": "2018-06-08 08:45:49",
                            "deleted_at": null,
                        }
                    ],
                    "users": [
                        {
                        "id": 11,
                        "username": "test",
                        "email": "admin@test.co",
                        "password": "$2y$10$2PKszZtS./bn2ZhOYLMx1.jM9HQr95GXMMXcLew9yvG3Ik2GU.eHe",
                        "old_password": null,
                        "is_active": 0,
                        "role": 1,
                        "last_logined_at": null,
                        "api_token": null,
                        "remember_token": null,
                        "created_at": "2018-06-08 08:45:47",
                        "updated_at": "2018-06-08 08:45:47",
                        "deleted_at": null,
                        }
                    ],
                },
                {
                    "id": 72,
                    "product_id": 1,
                    "user_id": 5,
                    "type": 2,
                    "content": "Aut ducimus repellendus ratione est. Veritatis sed sit et et ut dolorem soluta. Et aut esse ratione nam vel quia aut nesciunt. Nobis vero accusamus suscipit optio. Quia ea quidem asperiores eum tenetur aperiam earum nobis. Vel repellendus sed doloribus repellendus qui quis autem. Laboriosam et impedit dolorem odio rem qui. Alias dolore quo cumque iusto. Quia dolorum cumque et deleniti. Veritatis quidem eius distinctio qui. Omnis illo magnam ex rerum. Architecto dolore eaque magni soluta.",
                    "rating": null,
                    "status": 0,
                    "created_at": "2018-06-08 08:45:48",
                    "updated_at": "2018-06-08 08:45:48",
                    "deleted_at": null,
                    "users": [
                        {
                        "id": 1,
                        "username": "west.jesus",
                        "email": "emmett.zulauf@example.org",
                        "password": "$2y$10$MCq3E96HXzrVCM3JHDJ.4efgJ.B4zifkhrWic4pQ.magH75EZOtzi",
                        "old_password": null,
                        "is_active": 0,
                        "role": 0,
                        "last_logined_at": null,
                        "api_token": null,
                        "remember_token": null,
                        "created_at": "2018-06-08 08:45:47",
                        "updated_at": "2018-06-08 08:45:47",
                        "deleted_at": null,
                        }
                    ],
                },
                {
                    "id": 74,
                    "product_id": 1,
                    "user_id": 1,
                    "type": 2,
                    "content": "Minus dolores inventore delectus et optio vel. Dicta laboriosam accusamus consequuntur et. Neque perspiciatis vitae assumenda impedit et rerum in voluptas. Aperiam quas voluptas et aliquam. Dolores dolor omnis facilis dolor voluptate et consequuntur. Repellendus doloremque nihil quia ut et dolor voluptatum. Ut similique recusandae voluptas aut.",
                    "rating": null,
                    "status": 1,
                    "created_at": "2018-06-08 08:45:48",
                    "updated_at": "2018-06-08 08:45:48",
                    "deleted_at": null,
                    "users": [
                        {
                        "id": 5,
                        "username": "corwin.torrey",
                        "email": "reta50@example.net",
                        "password": "$2y$10$Llqpj.rUyU57Da.3TrpF4.sM6enQme2zboFyQOEL8MQm9tN5Bl0bu",
                        "old_password": null,
                        "is_active": 0,
                        "role": 0,
                        "last_logined_at": null,
                        "api_token": null,
                        "remember_token": null,
                        "created_at": "2018-06-08 08:45:47",
                        "updated_at": "2018-06-08 08:45:47",
                        "deleted_at": null,
                        }
                    ],
                },
            ],
        }
    ],
    "code": 200
}
```
