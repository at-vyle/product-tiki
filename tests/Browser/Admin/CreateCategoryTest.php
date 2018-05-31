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
     * List case for Test validate for input Create User
     *
     * @return array
     */
    public function listCaseTestValidateForInput()
    {
        return [
            ['name', '', 'The name field is required.'],
        ];
    }

    /**
     * List case for Test validate for input Create Category
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider listCaseTestValidateForInput
     *
     * @return array
     */
    public function testCategoryValidateForInput($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->visit('admin/categories/create');
            $browser->press('Submit')
                ->assertSee($message);
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
     * Dusk test create category success.
     *
     * @return void
     */
    public function testCreatesCategoryWithExistCategory()
    {
        factory('App\Models\Category', 1)->create();
        $itemCategory = Category::find(1);
        $this->browse(function (Browser $browser) use ($itemCategory) {
            $browser->visit('admin/categories/create')
                ->type('name', $itemCategory->name);   
            $browser->press('Submit')
                ->assertSee('The name has already been taken.');
        });
    }
}
