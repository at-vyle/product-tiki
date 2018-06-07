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
            ['name' , 1, 'ASC'],
            ['products_count' , 3, 'ASC'],
            ['name' , 1, 'DESC'],
            ['products_count' , 3, 'DESC'],
        ];
    }

    /**
     * Test sort category.
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortCategory($sortBy, $column, $dir)
    {
        $perPage = (int) (config('define.category.limit_rows'));
        $this->browse(function (Browser $browser) use ($sortBy, $column, $dir, $perPage) {
            factory('App\Models\Category', 20)->create();
            factory('App\Models\Product', 25)->create();
            $categories = Category::withCount('products')
                ->orderBy($sortBy, $dir)
                ->pluck($sortBy)
                ->toArray();
            $browser->visit(route('admin.categories.index', ['sortBy' => $sortBy, 'dir' => $dir, 'page' => 2]));
            for ($i = 1; $i <= $perPage; $i++) {
                $selector = ".table-responsive table tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $categories[$i + ($perPage - 1)]);
            }
        });
    }
}
