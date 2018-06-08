<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class SortCategoryTest extends DuskTestCase
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
        factory('App\Models\Category', 20)->create();
        factory('App\Models\Product', 25)->create();
    }

    /*
     * A Dusk test for click link sort
     *
     * @return void
     */
    public function testClickLinksSort()
    { 
        $sortCategories = ['name', 'products_count'];
        $this->browse(function (Browser $browser) use ($sortCategories) {
            $browser->visit(route('admin.categories.index'));
            foreach ($sortCategories as $sortBy) {
                $browser->click("#sort-by-$sortBy a")
                    ->assertQueryStringMissing('sort', $sortBy)
                    ->assertQueryStringMissing('order', 'asc')
                    ->click("#sort-by-$sortBy a")
                    ->assertQueryStringMissing('sort', $sortBy)
                    ->assertQueryStringMissing('order', 'desc');
            }
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
            ['products_count', 3, 'asc'],
            ['name', 1, 'desc'],
            ['products_count', 3, 'desc'],
        ];
    }

    /**
     * Test sort category.
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortCategory($sortBy, $column, $order)
    {
        $perPage = (int) (config('define.category.limit_rows'));
        $this->browse(function (Browser $browser) use ($sortBy, $column, $order, $perPage) {
            $categories = Category::withCount('products')
                ->orderBy($sortBy, $order)
                ->pluck($sortBy)
                ->toArray();
            $browser->visit(route('admin.categories.index', ['sortBy' => $sortBy, 'dir' => $order]));
            for ($i = 1; $i <= $perPage; $i++) {
                $selector = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $categories[$i - 1]);
            }
        });
    }

    /**
     * Test sort category paginate.
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortCategoryPaginate($sortBy, $column, $order)
    {
        $perPage = (int) (config('define.category.limit_rows'));
        $this->browse(function (Browser $browser) use ($sortBy, $column,$order, $perPage) {
            $categories = Category::withCount('products')
                ->orderBy($sortBy, $order)
                ->pluck($sortBy)
                ->toArray();
            $browser->visit(route('admin.categories.index', ['sortBy' => $sortBy, 'dir' => $order, 'page' => 2]));
            for ($i = 1; $i <= $perPage; $i++) {
                $selector = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $categories[$i + ($perPage - 1)]);
            }
        });
    }
}
