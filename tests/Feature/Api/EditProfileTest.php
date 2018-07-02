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
        factory('App\Models\UserInfo')->create([
            'user_id' => $this->user->id
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
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureValidate()
    {
        return [
            "message",
            "errors" => [
                "full_name"=> [],
                "avatar" => [],
                "address" => [],
                "phone" => [],
                "identity_card" => []
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
        $this->jsonUser('PUT', 'api/users/profile')
            ->assertStatus(200);
    }

    /**
     * Test structure code
     *
     * @return void
     */
    public function testStuctureCode()
    {
        $update = [
            'full_name' => 'teamIntern@asiantech.vn',
            'gender' => 1,
            'dob' => '2018-03-19',
            'address' => 'Street No.2 Van Don Industry, Da Nang City, Viet Nam',
            'phone' => '0123456789',
            'identity_card' => '987654321',
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/users/profile', $update)
            ->assertJsonStructure($this->jsonStructureEditProfile());
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $update = [
            'full_name' => 'teamIntern@asiantech.vn',
            'gender' => 1,
            'dob' => '2018-03-19',
            'address' => 'Street No.2 Van Don Industry, Da Nang City, Viet Nam',
            'phone' => '0123456789',
            'identity_card' => '987654321',
            '_method' => 'PUT'
        ];
        $responseProfie = $this->jsonUser('POST', 'api/users/profile', $update);

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

    /**
     * Test validate update
     *
     * @return void
     */
    public function testUpdateValidateForInput()
    {
        $update = [
            'full_name' => '',
            'avatar' => 'image.jpg',
            'address' => '',
            'phone' => '',
            'identity_card' => '',
            '_method' => 'PUT'
        ];
        $this->jsonUser('POST', 'api/users/profile', $update)
            ->assertJsonStructure($this->jsonStructureValidate());
    }
}
