<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class DetailProductTest extends TestCase
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
        factory('App\Models\Product')->create([
            'category_id' => 1
        ]);
        factory('App\Models\Image')->create([
            'product_id' => 1
        ]);
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForDetailProduct()
    {
        $response = $this->json('GET', '/api/products/1');
        $response->assertStatus(200);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureDetailProduct()
    { 
        return [
            [
                'url' => '/api/products/1',
                'structure' => [
                    'result' => [
                        'id',
                        'category_id',
                        'name',
                        'description',
                        'total_rate',
                        'rate_count',
                        'avg_rating',
                        'price',
                        'quantity',
                        'status',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'price_formated',
                        'image_path',
                        'category' => [
                            'id',
                            'parent_id',
                            'name',
                            'level',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                        ],
                        'images'=> [
                            [
                            'id',
                            'product_id',
                            'img_url',
                            'created_at',
                            'updated_at'
                            ]
                        ]
                    ],
                    'code'
                ]
            ]
        ];      
    }

    /**
     * @dataProvider jsonStructureDetailProduct
     *
     * @param string $url url of api detail product 
     * @param array  $structure structure of json 
     *
     * Test api structure
     *
     * @return void
     */
    public function testJsonStructure($url, $structure)
    {
        $response = $this->json('GET', $url);
        $response->assertJsonStructure($structure);
    }
}
