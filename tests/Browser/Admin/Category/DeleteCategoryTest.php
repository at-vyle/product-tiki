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
    public function testClickButtonDeleleUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                ->assertSee('List Categories')
                ->press('#deleted1')
                ->assertDialogOpened('Do you want to delete this Category?')
                ->dismissDialog();
            $this->assertDatabaseHas('categories',['deleted_at' => null]);
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
            $browser->visit('/admin/categories')
                ->press('#deleted1')
                ->assertDialogOpened('Do you want to delete this Category?')
                ->acceptDialog()
                ->assertSee('Delete Category Successfull!');
            $this->assertDatabaseMissing('categories',['deleted_at'=>null]);
        });
    }
}
