<?php

namespace Tests\Browser\Admin\Product;

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

    /**
     * Make cases for test.
     *
     * @return array
     */
    public function dataForTest()
    {
        return [
            ['name', 1, 'asc'],
            ['category_id', 2, 'asc'],
            ['quantity', 4, 'asc'],
            ['avg_rating', 5, 'asc'],
            ['name', 1, 'desc'],
            ['category_id', 2, 'desc'],
            ['quantity', 4, 'desc'],
            ['avg_rating', 5, 'desc'],
        ];
    }

    /**
     * Test sort product.
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortProduct($sortBy, $column, $dir)
    {
        $this->browse(function (Browser $browser) use ($sortBy, $column, $dir) {

            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 10)->create();
            $perPages = config('define.product.limit_rows');

            if ($sortBy == 'category_id') {
                $products = \DB::table('products')
                                    ->join('categories', 'products.category_id', '=', 'categories.id')
                                    ->orderBy($sortBy, $dir)
                                    ->pluck('categories.name')
                                    ->toArray();
            } else {
                $products = \DB::table('products')->orderBy($sortBy, $dir)->pluck($sortBy)->toArray();
            }

            $browser->visit(route('admin.products.index'))
                    ->clicklink('2');
            if ($dir == 'asc') {
                $browser->click("#sort-$sortBy-desc")
                        ->click("#sort-$sortBy-asc");
            } else {
                $browser->click("#sort-$sortBy-desc");
            }

            for ($i = 1; $i <= $perPages; $i++) {
                $elements = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($elements), $products[$i + $perPages - 1]);
            }
        });
    }

    /**
     * Make cases for test.
     *
     * @return array
     */
    public function dataForSortChangedValueTest()
    {
        return [
            ['price', 6, 'asc'],
            ['price', 6, 'desc'],
            ['status', 7, 'asc'],
            ['status', 7, 'desc'],
        ];
    }

    /**
     * Test sort product by price.
     * Test sort product by status.
     *
     * @dataProvider dataForSortChangedValueTest
     *
     * @return void
     */
    public function testSortProductChangedValue($sortBy, $column, $dir)
    {
        $this->browse(function (Browser $browser) use ($sortBy, $column, $dir) {

            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 10)->create();
            $perPages = config('define.product.limit_rows');

            $products = \DB::table('products')->orderBy($sortBy, $dir)->pluck($sortBy)->toArray();

            $browser->visit(route('admin.products.index'))
                    ->clicklink('2');
            if ($dir == 'asc') {
                $browser->click("#sort-$sortBy-desc")
                        ->click("#sort-$sortBy-asc");
            } else {
                $browser->click("#sort-$sortBy-desc");
            }

            for ($i = 1; $i <= $perPages; $i++) {
                $elements = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                if ($sortBy == 'price') {
                    $this->assertEquals($browser->text($elements), number_format($products[$i + $perPages - 1]));
                } else {
                    $products[$i + $perPages - 1] = $products[$i + $perPages - 1] == 0 ? 'Unavailable' : 'Available';
                    $this->assertEquals($browser->text($elements), $products[$i + $perPages - 1]);
                }
            }
        });
    }
}
