<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use App\Models\Order;

class cancelOrderTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Set up order
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Order')->create([
            'status' => 0,
        ]);
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForCancelOrder()
    {
        $response = $this->jsonUser('PUT', '/api/users/orders/1/cancel');
        $response->assertStatus(200);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureCancelOrder()
    {
        return [
            [
                'url' => '/api/users/orders/1/cancel',
                'structure' => [
                    'result' => [
                        'id',
                        'user_id',
                        'total',
                        'status',
                        'note',
                        'created_at',
                        'updated_at',
                        'deleted_at'
                    ],
                    'code'
                ]
            ]
        ];
    }

    /**
     * @dataProvider jsonStructureCancelOrder
     *
     * @param string $url url of api cancel order 
     * @param array  $structure structure of json 
     *
     * Test api structure
     *
     * @return void
     */
    public function testJsonStructure($url, $structure)
    {
        $cancel = [
            '_method' => 'PUT'
        ];
        $response = $this->jsonUser('POST', $url, $cancel);
        $response->assertJsonStructure($structure);
    }


    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $cancel = [
            '_method' => 'PUT'
        ];
        $response = $this->jsonUser('POST', 'api/users/orders/1/cancel', $cancel);
        $data = json_decode($response->getContent())->result;
        $arrayOrder = [
            'id' => $data->id,
            'user_id' => $data->user_id,
            'status' => $data->status,
        ];
        $this->assertDatabaseHas('orders', $arrayOrder);
    }
}
