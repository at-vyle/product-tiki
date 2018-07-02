<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteCommentTest extends TestCase
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
    public function jsonStructureDeleteComment()
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
     * Test status code
     *
     * @return void
     */
    public function testStatusCode()
    {
        $this->jsonUser('DELETE', 'api/comments/1')
            ->assertStatus(200);
    }

    /**
     * Test structure code
     *
     * @return void
     */
    public function testStructureCode()
    {
        $this->jsonUser('DELETE', 'api/comments/1')
            ->assertJsonStructure($this->jsonStructureDeleteComment());
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $response = $this->jsonUser('DELETE', 'api/comments/1');

        $data = json_decode($response->getContent())->result;
        $arrayComment = [
            'id' => $data->id,
            'post_id' => $data->post_id,
            'user_id' => $data->user_id,
            'deleted_at' => $data->deleted_at,
            
        ];
        $this->assertDatabaseHas('comments', $arrayComment);
    }
}
