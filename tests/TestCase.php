<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $user, $token;

    /**
     * Set up TestCase
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('passport:install');

        $this->user = factory('App\Models\User')->create();
        $this->token =  $this->user->createToken('token')->accessToken;
        factory('App\Models\UserInfo')->create([
            'user_id' => $this->user->id,
        ]);
    }

    /**
     * Get json response
     *
     * @return json
     */
    public function jsonUser($method, $url, $data = [], $header = [])
    {
        if ($header) {
            return $this->json($method, $url, $data, $header);
        }
        return $this->json($method, $url, $data, ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$this->token]);
    }
}
