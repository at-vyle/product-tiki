<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test url create category
     *
     * @return void
     */
    public function testCreateCategoriesUrl()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                ->clickLink('Add Categories')
                ->pause(1000)
                ->assertPathIs('/admin/categories/create')
                ->assertSee('Add Category');
        });
    }

    /**
     * Dusk test create category success.
     *
     * @return void
     */
    public function testCreatesCategoryNoParentCategorySuccess()
    {
        $testContent = 'Smart Phone'; 
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('admin/categories/create')
                ->type('name', $testContent)
                ->select('parent_id', null);       
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee('Create New Category Successfull!');
            $this->assertDatabaseHas('categories', [
                'id' => 1,
                'name' => $testContent,
                'parent_id' => null,
                'level' => 0
            ]);
        });
    }

    /**
     * Dusk test create category success.
     *
     * @return void
     */
    public function testCreatesCategoryHasParentCategorySuccess()
    {
        $testContent = 'Iphone';
        factory('App\Models\Category', 1)->create();
        $itemCategory = Category::find(1);
        $this->browse(function (Browser $browser) use ($testContent, $itemCategory) {
            $browser->visit('admin/categories/create')
                ->type('name', $testContent)
                ->select('parent_id', $itemCategory->id);       
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee('Create New Category Successfull!');
            $this->assertDatabaseHas('categories', [
                'id' => 2,
                'name' => $testContent,
                'parent_id' => $itemCategory->id,
                'level' => 1,
            ]);
        });
    }

    /**
     * List case for Test validate for input Create Category
     *
     * @return array
     */
    public function testCategoryValidateForInput()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/categories/create');
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee('The name field is required.');
        });
    }
}
