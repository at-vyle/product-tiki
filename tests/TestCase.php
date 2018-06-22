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
     * get headers
     *
     * @return void
     */
    public function getHeaders()
    {
        return ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$this->token];
    }
}
