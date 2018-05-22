<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
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
            $browser->visit('/admin/categories/create')
                ->assertPathIs('/admin/categories/create')
                ->assertSee('Add Category');
        });
    }
    /**
     * Dusk test create category success.
     *
     * @return void
     */
    public function testCreatesCategoryHasParentCategorySuccess()
    {
        $testContent = 'dasdjsahdjsahdkjsad'; 
        $this->browse(function (Browser $browser) use ($testContent) {
            factory('App\Models\Category', 2)->create();
            $browser->visit('admin/categories/create')
                ->type('name', $testContent)
                ->select('parent_id', '1');       
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee(__('category.admin.message'));
            $this->assertDatabaseHas('categories', [
                'id' => 3,
                'name' => $testContent,
                'parent_id' => '1',
            ]);
        });
    }
    /**
     * Dusk test create category success.
     *
     * @return void
     */
    public function testCreatesCategoryNoParentCategorySuccess()
    {
        $testContent = 'Iphone'; 
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('admin/categories/create')
                ->type('name', $testContent)
                ->select('parent_id', null);       
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee(__('category.admin.message'));
            $this->assertDatabaseHas('categories', [
                'id' => 1,
                'name' => $testContent,
                'parent_id' => null,
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
            $browser->visit('admin/categories/create')
                ->type('name', '');
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee('The name field is required.');
        });
    }
}
