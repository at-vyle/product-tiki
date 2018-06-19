<?php
namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * Set up database
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
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
    public function jsonStructureLoginSuccess()
    {
        return [
          'result' => [
              'token',
              'user' => [
                  'id',
                  'username',
                  'email',
                  'old_password',
                  'is_active',
                  'role',
                  'last_logined_at',
                  'created_at',
                  'updated_at',
                  'deleted_at',
                  'user_info' => [
                      'id',
                      'user_id',
                      'full_name',
                      'avatar',
                      'gender',
                      'dob',
                      'address',
                      'phone',
                      'identity_card',
                      'created_at',
                      'updated_at'
                  ]
              ]
          ],
          'code'
        ];
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonLoginSuccess()
    {
        $user = User::find(1);
        $body = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $this->json('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureLoginSuccess());
    }

    /**
    * Return structure of json.
    *
    * @return array
    */
    public function jsonStructureAuthenticateFail()
    {
        return [
          "error",
          "code"
      ];
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonLoginFail()
    {
        $user = User::find(1);
        $body = [
            'email' => $user->email,
            'password' => 'neverlucky'
        ];
        $this->json('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure($this->jsonStructureAuthenticateFail());
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonLogoutSuccess()
    {
        $user = User::find(1);
        $body = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $response = $this->json('POST', '/api/login', $body, ['Accept' => 'application/json']);

        $token = json_decode($response->getContent())->result->token;
        $this->json('POST', 'api/logout', [], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertStatus(204);
    }
}
