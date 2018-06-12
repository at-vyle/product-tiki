<?php
namespace Tests\Browser\Admin\Order;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Order;

class AdminSortPostTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 3)->create();
        factory('App\Models\Product', 10)->create();
        factory('App\Models\User', 10)->create();
        factory('App\Models\Order', 10)->create();
        factory('App\Models\OrderDetail', 20)->create();
    }

    /**
     * test sort Order by number of product
     *
     * @return void
     */
    public function testSortPostByNumberOfProducts()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/orders')
                    ->click('#sort-by-product-count');
            $ordersSortAsc = Order::withCount('orderdetails')->orderBy('orderdetails_count', 'asc')->pluck('orderdetails_count')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = ".table tbody tr:nth-child($i) td:nth-child(3)";
                $this->assertEquals($browser->text($selector), $ordersSortAsc[$i-1]);
            }

            $browser->click('#sort-by-product-count');
            $ordersSortDesc = Order::withCount('orderdetails')->orderBy('orderdetails_count', 'desc')->pluck('orderdetails_count')->toArray();
            for ($i = 1; $i <= 5; $i++) {
                $selector = ".table tbody tr:nth-child($i) td:nth-child(3)";
                $this->assertEquals($browser->text($selector), $ordersSortDesc[$i-1]);
            }
        });
    }

    /**
     * test sort Order by total.
     *
     * @return void
     */
    public function testSortOrderByTotal()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/orders')
                    ->click('#sort-by-total');

            $ordersSortAsc = Order::orderBy('total', 'ASC')->pluck('total')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = ".table tbody tr:nth-child($i) td:nth-child(4)";
                $this->assertEquals($browser->text($selector), number_format($ordersSortAsc[$i-1]));
            }

            $browser->click('#sort-by-total');
            $ordersSortDesc = Order::orderBy('total', 'DESC')->pluck('total')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = ".table tbody tr:nth-child($i) td:nth-child(4)";
                $this->assertEquals($browser->text($selector), number_format($ordersSortDesc[$i-1]));
            }
        });
    }
}
