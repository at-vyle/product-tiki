<?php
namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\UserInfo;

class GetProfilePostsTest extends TestCase
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
        factory('App\Models\User', 2)->create();
        $inputId = User::doesntHave('userInfo')->pluck('id')->toArray();
        $inputCount = count($inputId);
        for ($i = 0; $i < $inputCount; $i++) {
            factory('App\Models\UserInfo')->create([
                'user_id' => $i+1,
            ]);
        }
        factory('App\Models\Post', 20)->states('rating')->create();
        Artisan::call('passport:install');
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureGetPostsSuccess()
    {
        return [
            'result' => [
                'paginator' => [
                    'current_page',
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total'
                ],
                'data' => [
                    [
                        'id',
                        'product_id',
                        'user_id',
                        'type',
                        'content',
                        'rating',
                        'status',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                    ]
                ]
            ],
            'code'
        ];
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testGetPostsOfUser()
    {
        $user = User::find(1);
        $login = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $response = $this->json('POST', '/api/login', $login, ['Accept' => 'application/json']);
        $token = json_decode($response->getContent())->result->token;

        $this->json('GET', 'api/posts', [], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureGetPostsSuccess());
    }
}
