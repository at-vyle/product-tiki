<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class apiProductTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 5)->create();
        factory('App\Models\Product', 10)->create();
        factory('App\Models\Image', 10)->create();
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForProduct()
    {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureListProduct()
    {
        return [
            [
                'url' => '/api/products',
                'structure' => [
                    'result' => [
                        'paginator' => [
                            'current_page',
                            'first_page_url',
                            'from',
                            'last_page',
                            'last_page_url',
                            'next_page_url',
                            'path',
                            'per_page',
                            'prev_page_url',
                            'to',
                            'total'
                        ],
                        'data' => [
                            [
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
                                'quantity_sold',
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
                                'images'
                            ]
                        ]

                    ],
                    'code'
                ]
            ]
        ];
    }

    /**
     * @dataProvider jsonStructureListProduct
     *
     * @param string $url url of api product
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

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $response = $this->json('GET', 'api/products');
        $data = json_decode($response->getContent())->result->data;
        foreach ($data as $product) {
            $arrayCompare = [
                'id' => $product->id,
                'name' => $product->name,
            ];
            $this->assertDatabaseHas('products', $arrayCompare);
        }
    }

    /**
     * Test paginate
     *
     * @return void
     */
    public function testJsonPaginate()
    {
        $dataTest = [
            'perpage' => 5,
            'page' => 2
        ];
        $response = $this->json('GET', '/api/products?perpage=' . $dataTest['perpage'] . '&page=' . $dataTest['page'] . '');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->result->paginator->per_page, $dataTest['perpage']);
        $this->assertEquals($data->result->paginator->current_page, $dataTest['page']);
    }
}
