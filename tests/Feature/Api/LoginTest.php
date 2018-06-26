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
        $body = [
            'email' => $this->user->email,
            'password' => '12345'
        ];
        $this->jsonUser('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureLoginSuccess());
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonLoginFail()
    {
        $body = [
            'email' => $this->user->email,
            'password' => 'neverlucky'
        ];
        $this->jsonUser('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure([
              "error",
              "code"
          ]);
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonLogoutSuccess()
    {
        $this->jsonUser('POST', 'api/logout')
            ->assertStatus(204);
    }
}
