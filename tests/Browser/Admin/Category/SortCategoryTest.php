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
        factory('App\Models\Category', 25)->create();
        for ($i = 1; $i <= 25; $i++) {
            factory('App\Models\Product', 40)->create([
                'category_id' => $i,     
            ]);
        }
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
            $browser->visit('/admin/categories');
            foreach ($sortCategories as $sort) {
                $browser->click("#sort-by-$sort a")
                    ->assertQueryStringMissing('sort', $sort)
                    ->assertQueryStringMissing('order', 'asc')
                    ->click("#sort-by-$sort a")
                    ->assertQueryStringMissing('sort', $sort)
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
            ['name', 'categories.name', 1],
            // ['full_name', 'user_info.full_name', 4],
        ];
    }

    /**
     * A Dusk test sort category by name
     *
     * @param string $name name of column
     * @param string $order order in database
     * @param string $column column index of column
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortCategory($name, $order, $column)
    {
        $this->browse(function (Browser $browser) use ($name, $order, $column) {
            $browser->visit('admin/categories')
                ->click("#sort-by-$name a");

            //Test sort Categories Desc
            $arrayDesc = Category::orderBy($order, 'desc')->pluck($order)->toArray();
            for ($i = 1; $i <= 10; $i++) {
                $selector = "#table-list tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arrayDesc[$i - 1]);
            }

            //Test sort Categories Asc
            $browser->click("#sort-by-$name a");
            $arrayAsc = Category::orderBy($order, 'asc')->pluck($order)->toArray();
            for ($i = 1; $i <= 10; $i++) {
                $selector = "#table-list tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arrayAsc[$i - 1]);
            }
        });
    }

    
}
