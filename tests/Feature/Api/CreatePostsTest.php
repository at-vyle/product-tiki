<?php
namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Set up product
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category')->create();
        factory('App\Models\Product')->create();
        $user = factory('App\Models\User')->create();
        factory('App\Models\UserInfo')->create([
            'user_id' => $user->id
        ]);
        Artisan::call('passport:install');
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureCreatePostsSuccess()
    {
        return [
          "result" => [
              "type",
              "content",
              "rating",
              "user_id",
              "product_id",
              "updated_at",
              "created_at",
              "id"
          ],
          "code"
      ];
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureCreatePostsFailValidation()
    {
        return [
          "message",
          "errors" => [],
          "code",
          "request" => []
      ];
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testCreatePosts()
    {
        $user = User::find(1);

        $login = [
            'email' => $user->email,
            'password' => '12345'
        ];

        $response = $this->json('POST', '/api/login', $login, ['Accept' => 'application/json']);
        $token = json_decode($response->getContent())->result->token;
        $posts = [
            'type' => 1,
            'content' => 'testing Content',
            'rating' => 3
        ];

        $this->json('POST', 'api/products/1/posts', $posts, ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureCreatePostsSuccess());

        $this->json('POST', 'api/products/1/posts', [], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertStatus(422)
            ->assertJsonStructure($this->jsonStructureCreatePostsFailValidation());
    }
}
