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

class EditProfileTest extends TestCase
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
    public function jsonStructureEditProfile()
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
    public function testStatusCode()
    {
        $user = User::find(1);
        $login = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $response = $this->json('POST', '/api/login', $login, ['Accept' => 'application/json']);
        $token = json_decode($response->getContent())->result->token;

        $this->json('PUT', 'api/users/profile', [], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertStatus(200);
    }

     /**
     * Test structure code
     *
     * @return void
     */
    public function testStuctureCode()
    {
        $user = User::find(1);
        $login = [
            'email' => $user->email,
            'password' => '12345'
        ];
        $response = $this->json('POST', '/api/login', $login, ['Accept' => 'application/json']);
        $token = json_decode($response->getContent())->result->token;
        
        $update = [
            'full_name' => 'teamIntern@asiantech.vn',
            'avatar' => 'image.jpg',
            'gender' => 1,
            'dob' => '2018-03-19',
            'address' => 'Street No.2 Van Don Industry, Da Nang City, Viet Nam',
            'phone' => '0123456789',
            'identity_card' => '987654321'
        ];
        $this->json('PUT', 'api/users/profile', [$update], ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$token])
            ->assertJsonStructure($this->jsonStructureEditProfile());
    }

    /**
     * List case for Test Api validate for input Update Profile
     *
     * @return array
     */
    public function testValidateForInput()
    {
        return [
            ['full_name', '', 'The name field is required.'],
            ['name', '    ', 'The name field is required.'],
            ['name', '.-=+{}()[]^$@#', 'The name format is invalid.'],
            ['name', 'Iphone', 'The name has already been taken.'],
        ];
    }
}
