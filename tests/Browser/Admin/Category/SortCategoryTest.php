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
            ['name', 1],
            ['products_count', 3],
        ];
    }

    /**
     * Test sort category.
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortCategory($sortBy, $column)
    {
        $perPage = (int) (config('define.category.limit_rows'));
        $this->browse(function (Browser $browser) use ($sortBy, $column, $perPage) {
            //sort desc
            $browser->visit(route('admin.categories.index'))
                ->click("#sort-by-$sortBy a");
            $categories = Category::withCount('products')
                ->orderBy($sortBy, 'desc')
                ->pluck($sortBy)
                ->toArray();
            for ($i = 1; $i <= $perPage; $i++) {
                $selector = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $categories[$i - 1]);
            }
            //sort asc
            $browser->click("#sort-by-$sortBy a");
            $categories = Category::withCount('products')
                ->orderBy($sortBy, 'asc')
                ->pluck($sortBy)
                ->toArray();
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
    public function testSortCategoryPaginate($sortBy, $column)
    {
        $perPage = (int) (config('define.category.limit_rows'));
        $this->browse(function (Browser $browser) use ($sortBy, $column, $perPage) {
            $browser->visit(route('admin.categories.index'))
                ->click("#sort-by-$sortBy a");
            $categories = Category::withCount('products')
                ->orderBy($sortBy, 'desc')
                ->pluck($sortBy)
                ->toArray();
            $browser->clickLink('2');
            for ($i = 1; $i <= $perPage; $i++) {
                $selector = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $categories[$i + ($perPage - 1)]);
            }
        });
    }

    /**
     * Test click sort category after paginate.
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortCategoryAfterPaginate($sortBy, $column)
    {
        $perPage = (int) (config('define.category.limit_rows'));
        $this->browse(function (Browser $browser) use ($sortBy, $column, $perPage) {
            $browser->visit(route('admin.categories.index'))
                ->clickLink('2')
                ->click("#sort-by-$sortBy a");
            $categories = Category::withCount('products')
                ->orderBy($sortBy, 'desc')
                ->pluck($sortBy)
                ->toArray();
            for ($i = 1; $i <= $perPage; $i++) {
                $selector = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $categories[$i + ($perPage - 1)]);
            }
        });
    }
}
