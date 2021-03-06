<?php
namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class RegisterTest extends TestCase
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
    public function jsonStructureRegisterFail()
    {
        return [
            'message',
            'errors' => [
                'username',
                'email',
                'identity_card'
            ],
            'code',
            'request'
        ];
    }

    /**
    * Return structure of json.
    *
    * @return array
    */
    public function jsonStructureRegisterSuccess()
    {
        return [
          'result' => [
              'token',
              'user' => [
                  'username',
                  'email',
                  'updated_at',
                  'created_at',
                  'id',
                  'user_info' => []
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
    public function testJsonRegisterFail()
    {

        $this->user->load('userinfo');
        $body = [
            'username' => $this->user->username,
            'email' => $this->user->email,
            'password' => 'neverlucky',
            'full_name' => 'some name',
            'address' => 'some address',
            'gender' => '1',
            'phone' => '1234567890',
            'identity_card' => $this->user['userinfo']['identity_card']
        ];

        $this->jsonUser('POST', '/api/register', $body, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonStructure($this->jsonStructureRegisterFail());
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonRegisterSuccess()
    {
        $body = [
            'username' => 'Test Username',
            'email' => 'test@email.abc',
            'password' => 'neverlucky',
            'full_name' => 'some name',
            'address' => 'some address',
            'gender' => '1',
            'phone' => '1234567890',
            'identity_card' => '672678902'
        ];

        $response = $this->jsonUser('POST', '/api/register', $body, ['Accept' => 'application/json']);
        $response->assertStatus(200)->assertJsonStructure($this->jsonStructureRegisterSuccess());
        $data = json_decode($response->getContent())->result->user;
        $userCompare = [
            'username' => $data->username,
            'email' => $data->email,
        ];
        $userInfoCompare = [
            'user_id' => $data->id,
        ];
        $this->assertDatabaseHas('users', $userCompare);
        $this->assertDatabaseHas('user_info', $userInfoCompare);
    }
}
