<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Post;

class UpdatePostTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Set up user
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\UserInfo')->create([
            'user_id' => $this->user->id
        ]);
        factory('App\Models\Category')->create();
        factory('App\Models\Product')->create([
            'category_id' => 1
        ]);
        factory('App\Models\Post')->create([
            'product_id' => 1,
            'user_id' => $this->user->id
        ]);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureUpdatePost()
    {
        return [
            "result" => [
                "id",
                "product_id",
                "user_id",
                "type",
                "content",
                "rating",
                "status",
                "created_at",
                "updated_at",
                "deleted_at",
                "product" => [
                    "id",
                    "category_id",
                    "name",
                    "description",
                    "total_rate",
                    "rate_count",
                    "avg_rating",
                    "price",
                    "quantity",
                    "quantity_sold",
                    "status",
                    "created_at",
                    "updated_at",
                    "deleted_at"
                ],
                "user" => [
                    "id",
                    "username",
                    "email",
                    "old_password",
                    "is_active",
                    "role",
                    "last_logined_at",
                    "created_at",
                    "updated_at",
                    "deleted_at",
                    "userinfo" => [
                        "id",
                        "user_id",
                        "full_name",
                        "avatar",
                        "gender",
                        "dob",
                        "address",
                        "phone",
                        "identity_card",
                        "created_at",
                        "updated_at"
                    ]
                ]
            ],
            "code"
        ];
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureValidate()
    {
        return [
            "message",
            "errors" => [
                "type" => [],
                "rating" => [],
                "content" => []
            ],
            "code",
            "request" => []
        ];
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCode()
    {
        $content = 'Good Product';
        $rating = 5;
        $update = [
            'type' => Post::TYPE_REVIEW,
            'content' => $content,
            'rating' => $rating,
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/posts/1', $update)
            ->assertStatus(200);
    }

     /**
     * Test structure code
     *
     * @return void
     */
    public function testStuctureCode()
    {
        $content = 'Good Product';
        $rating = 5;
        $update = [
            'type' => Post::TYPE_REVIEW,
            'content' => $content,
            'rating' => $rating,
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/posts/1', $update)
            ->assertJsonStructure($this->jsonStructureUpdatePost());
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $content = 'Good Product';
        $rating = 5;
        $update = [
            'type' => Post::TYPE_REVIEW,
            'content' => $content,
            'rating' => $rating,
            '_method' => 'PUT'
        ];
        $response = $this->jsonUser('POST', 'api/posts/1', $update);

        $data = json_decode($response->getContent())->result;
        $arrayPost = [
            'id' => $data->id,
            'product_id' => $data->product_id,
            'user_id' => $data->user_id,
            'type' => $data->type,
            'content' => $data->content,
            'rating' => $data->rating
        ];
        $this->assertDatabaseHas('posts', $arrayPost);
    }

    /**
     * Test validate update
     *
     * @return void
     */
    public function testUpdateValidate()
    {
        $update = [
            'type' => '',
            'content' => '',
            'rating' => '',
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/posts/1', $update)
            ->assertStatus(422)
            ->assertJsonStructure($this->jsonStructureValidate());
    }
}
