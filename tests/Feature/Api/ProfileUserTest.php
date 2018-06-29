<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\UserInfo;
class UserInformationTest extends TestCase
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
        factory('App\Models\User')->create();
        factory('App\Models\UserInfo')->create([
            'user_id' => 1
        ]);

        Artisan::call('passport:install');
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureGetProfile()
    {
        return [
            "result"=> [
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
                "image_path",
                "userinfo"=> [
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
            ],
            "code"
        ];
    }
    
    /**
     * Test status code
     *
     * @return void
     */
    public function testGetProfileOfUser()
    {
        $user = User::find(1);
        $login = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $response = $this->json('POST', '/api/login', $login, ['Accept' => 'application/json']);
        $token = json_decode($response->getContent())->result->token;

        $this->json('GET', 'api/users/profile', [], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureGetProfile());
    }

     /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $user = User::find(1);
        $login = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $responseLogin = $this->json('POST', '/api/login', $login, ['Accept' => 'application/json']);
        $token = json_decode($responseLogin->getContent())->result->token;

        $responseProfie = $this->json('GET', 'api/users/profile', [], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token]);
        
        $data = json_decode($responseProfie->getContent())->result;

        $arrayUser = [
            'id' => $data->id,
            'username' => $data->username,
            'email' => $data->email
        ];
        $this->assertDatabaseHas('users', $arrayUser);
        $arrayUserInfo = [
            'id' => $data->userinfo->id,
            'user_id' => $data->userinfo->user_id
        ];
        $this->assertDatabaseHas('user_info', $arrayUserInfo);
    }
}
