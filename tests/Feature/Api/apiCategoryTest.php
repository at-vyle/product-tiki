<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class apiCategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 1)->create();
    }

     /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForCategory()
    {
        $response = $this->json('GET', '/api/categories');
        $response->assertStatus(200);
    }
}
