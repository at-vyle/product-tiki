<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Image;

class detailOrderTest extends TestCase
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
        factory('App\Models\Product')->create();
        factory('App\Models\Image', 2)->create();
        factory('App\Models\Order')->create();
        factory('App\Models\OrderDetail')->create();
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForDetailOrder()
    {
        $response = $this->json('GET', '/api/orders/1');
        $response->assertStatus(401);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureDetailOrder()
    { 
        return [
            [
                'url' => '/api/orders/1',
                'structure' => [
                    'result' => [
                        'id',
                        'user_id',
                        'total',
                        'status',
                        'note',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'total_formated',
                        'image_path',
                        'order_details' => [
                            [
                                'id',
                                'product_id',
                                'order_id',
                                'quantity',
                                'product_price',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                                'price_formated',
                                'product' => [
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
                                    'quantity_sold',
                                    'created_at',
                                    'updated_at',
                                    'deleted_at',
                                    'images' => [
                                        [
                                            'id',
                                            'product_id',
                                            'img_url',
                                            'created_at',
                                            'updated_at'
                                        ]
                                    ]   
                                ]
                            ]
                        ]
                    ],
                    'code'
                ]
            ]
        ];      
    }

    /**
     * @dataProvider jsonStructureDetailOrder
     *
     * @param string $url url of api detail order 
     * @param array  $structure structure of json 
     *
     * Test api structure
     *
     * @return void
     */
    public function testJsonStructure($url, $structure)
    {
        $response = $this->jsonUser('GET', $url);
        $response->assertJsonStructure($structure);
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $response = $this->jsonUser('GET', 'api/orders/1');
        $data = json_decode($response->getContent())->result;
        $arrayCompare = [
            'id' => $data->id,
            'user_id' => $data->user_id,
            'total' => $data->total
        ];
        $this->assertDatabaseHas('orders', $arrayCompare);
    }
}
