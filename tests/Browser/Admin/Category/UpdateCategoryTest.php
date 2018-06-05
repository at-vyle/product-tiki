<?php

namespace Tests\Browser\Admin\Category;

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
        factory('App\Models\Category')->create([
            'name' => 'Smart Phone',
        ]);
        factory('App\Models\Category')->create([
            'name' => 'IPhone',
            'parent_id' => 1,
            'level' => 1
        ]);
        factory('App\Models\Category')->create([
            'name' => 'IPhone X',
            'parent_id' => 2,
            'level' => 2
        ]);
    }

    /**
     * Test url update category
     *
     * @return void
     */
    public function testUpdateCategoryUrl()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                ->click('#edit1');
            $browser->assertPathIs('/admin/categories/1/edit')
                ->assertSee('Edit Category');
        });
    }

    /**
     * List case for Test validate for input Update Category
     *
     * @return array
     */
    public function listCaseTestValidateForInput()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['name', '    ', 'The name field is required.'],
            ['name', '.-=+{}()[]^$@#', 'The name format is invalid.'],
            ['name', 'Iphone', 'The name has already been taken.'],
        ];
    }

    /**
     * List case for Test validate for input Update Category
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
            $browser->visit('admin/categories/1/edit')
                ->assertSee('Edit Category')
                ->type($name, $content);
            $browser->press('Submit')
                ->assertSee($message);
        });
    }

    /**
     * Test Category Edit By This Child Fail.
     *
     * @return void
     */
    public function testEditCategoryByThisChildFail()
    {
        $categoryOther = Category::find(1);
        $this->browse(function (Browser $browser) use ($categoryOther) {
            $browser->visit('/admin/categories/2/edit')
                ->assertSee('Edit Category')
                ->select('parent_id', $categoryOther->id);
            $categoryOther->update([
                'parent_id' => 3,
                'level' => 2,
            ]);
            $browser->press('Submit')
                ->assertSee('Can not edit Category by this Child!')
                ->assertPathIs('/admin/categories/2/edit');
        });
    }

    /**
     * Test Category Edit Success.
     *
     * @return void
     */
    public function testEditCategorySuccess()
    {
        $testName = 'SamSung';
        $categoryOther = Category::find(1);
        $this->browse(function (Browser $browser) use ($testName, $categoryOther) {
            $browser->visit('/admin/categories/2/edit')
                ->assertSee('Edit Category')
                ->type('name', $testName)
                ->select('parent_id', $categoryOther->id)
                ->press('Submit')
                ->assertSee('Update Category Successfull!')
                ->assertPathIs('/admin/categories');
        });
        $this->assertDatabaseHas('categories', [
            'id' => 2,
            'name' => $testName,
            'parent_id' => $categoryOther->id,
            'level' => ++$categoryOther->level,
        ]);
    }

    /**
     * Test Category Edit No Parent Success.
     *
     * @return void
     */
    public function testEditCategoryNoParentSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/2/edit')
                ->assertSee('Edit Category')
                ->select('parent_id', null)
                ->press('Submit')
                ->assertSee('Update Category Successfull!')
                ->assertPathIs('/admin/categories');
        });
        $this->assertDatabaseHas('categories', [
            'parent_id' => null,
            'level' => 0,
        ]);
    }
}
