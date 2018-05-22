<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\Models\Category;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 2)->create();
    }
    /**
     * Test url create category
     *
     * @return void
     */
    public function testUpdateCategoryUrl()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/1/edit')
                ->assertSee(__('category.admin.edit.title'));
        });
    }

    /**
     * Test Users Edit Success.
     *
     * @return void
     */
    public function testEditCategorySuccess()
    {
        $category = Category::find(1);
        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('/admin/categories/'.$category->id.'/edit')
                    ->assertSee(__('category.admin.edit.title'))
                    ->type('name', $category->name)
                    ->select('parent_id', 2)
                    ->press(__('category.admin.add.submit'))
                    ->assertSee(__('category.admin.message.edit'))
                    ->assertPathIs('/admin/categories');
        });
        $this->assertDatabaseHas('categories', [
                    'name' => $category->name,
                    'parent_id' => 2
                ]);
    }
    /**
     * List case for Test validate for input Create Category
     *
     * @return array
     */
    public function testCategoryValidateForInput()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/categories/1/edit')
                ->type('name', null);
            $browser->press(__('category.admin.add.submit'))
                ->pause(1000)
                ->assertSee('The name field is required.');
        });
    }
}
