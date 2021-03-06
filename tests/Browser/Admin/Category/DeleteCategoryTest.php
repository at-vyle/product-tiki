<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use App\Models\Category;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category')->create();
    }

    /**
     * Test button delete category in List Categories
     *
     * @return void
     */
    public function testClickButtonDeleleCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/categories')
                ->assertSee('List Categories')
                ->click('#deleted1 > button')
                ->assertDialogOpened('Do you want to delete ?')
                ->dismissDialog();
            $this->assertDatabaseHas('categories', ['deleted_at' => null]);
        });
    }

    /**
     * Test click button Delete
     *
     * @return void
     */
    public function testConfirmDeleteOnPopup()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/categories')
                ->click('#deleted1 > button')
                ->assertDialogOpened('Do you want to delete ?')
                ->acceptDialog()
                ->assertSee('Delete Category Successfull!');
            $this->assertDatabaseMissing('categories', ['deleted_at' => null]);
        });
    }

    /**
     * Case test Delete Category Already Delete
     *
     * @return void
     */
    public function testDeleteCatgoryAlreadyDelete()
    {
        $category = Category::find(1);
        $this->browse(function (Browser $browser) use ($category) {
            $browser->loginAs($this->user)->visit('/admin/categories');
            $category->delete();
            $browser->click('#deleted1 > button')
                ->assertDialogOpened('Do you want to delete ?')
                ->acceptDialog()
                ->assertSee('Sorry, the page you are looking for could not be found.');
        });
    }
}
