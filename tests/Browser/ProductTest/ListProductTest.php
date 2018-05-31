<?php

namespace Tests\Browser\ProductTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testListProduct()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/products')
                    ->assertSee('Product List');
        });
    }

    /**
     * Test data empty.
     *
     * @return void
     */
    public function testDataEmpty()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/products')
                    ->assertSee('Product List');
            $elements = $browser->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 0);
        });
    }

    /**
     * Test pagination.
     *
     * @return void
     */
    public function testPagination()
    {
        $this->browse(function (Browser $browser) {

            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 10)->create();

            $browser->loginAs($this->user);

            $elements = $browser->visit('/admin/products')
                                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);

            $this->assertTrue($numRecord == 5);

            $elements = $browser->visit('/admin/products?page=3')
                                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 0);
        });
    }

    /**
     * Test search product.
     *
     * @return void
     */
    public function testSearchProduct()
    {
        $this->browse(function (Browser $browser) {

            $name = 'lorem';
            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 10)->create();
            factory('App\Models\Product', 1)->create([
                'name' => $name
            ]);

            $elements = $browser->loginAs($this->user)
                                ->visit('/admin/products')
                                ->type('content', $name)
                                ->press('Go')
                                ->assertSee($name);

        });
    }
}
