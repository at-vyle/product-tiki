<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateCommentTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Set up
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
        factory('App\Models\Comment')->create([
            'post_id' => 1,
            'user_id' => $this->user->id
        ]);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureUpdateComment()
    {
        return [
            "result" => [
                "id",
                "user_id",
                "post_id",
                "content",
                "created_at",
                "updated_at",
                "deleted_at",
                "user"  => [
                    "id",
                    "username",
                    "email",
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
        $update = [
            'content' => $content,
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/comments/1', $update)
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
        $update = [
            'content' => $content,
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/comments/1', $update)
            ->assertJsonStructure($this->jsonStructureUpdateComment());
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $content = 'Good Product';
        $update = [
            'content' => $content,
            '_method' => 'PUT'
        ];
        $response = $this->jsonUser('POST', 'api/comments/1', $update);

        $data = json_decode($response->getContent())->result;
        $arrayPost = [
            'id' => $data->id,
            'post_id' => $data->post_id,
            'user_id' => $data->user_id,
            'content' => $data->content
        ];
        $this->assertDatabaseHas('comments', $arrayPost);
    }

    /**
     * Test validate update
     *
     * @return void
     */
    public function testUpdateValidate()
    {
        $update = [
            'content' => '',
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/comments/1', $update)
            ->assertStatus(422)
            ->assertJsonStructure($this->jsonStructureValidate());
    }
}
