<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;

class apiProfileOrderTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 5)->create();
        factory('App\Models\User', 2)->create();
        factory('App\Models\Order', 10)->create();
        factory('App\Models\OrderDetail', 10)->create();
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForUserOrder()
    {
        $response = $this->json('GET', '/api/orders');
        $response->assertStatus(401);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureListOrders()
    {
        return [
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
                        'user_id',
                        'total',
                        'status',
                        'note',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'order_details_count',
                        'user' => [
                            'id',
                            'username',
                            'email',
                            'old_password',
                            'is_active',
                            'role',
                            'last_logined_at',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                        ]  
                    ]
                ]
            ],
            'code'
        ];
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function testGetOrdersOfUser()
    {
        $this->jsonUser('GET', 'api/orders')
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureListOrders());
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

        $response = $this->jsonUser('GET', 'api/orders?perpage=' . $dataTest['perpage'] . '&page=' . $dataTest['page'] . '');
        $data = json_decode($response->getContent());
        
        $this->assertEquals($data->result->paginator->per_page, $dataTest['perpage']); 
        $this->assertEquals($data->result->paginator->current_page, $dataTest['page']);
    }
}
