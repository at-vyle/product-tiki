<?php

namespace Tests\Browser;

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
        factory('App\Models\Category', 1)->create();
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
                ->assertSee(__('category.admin.list.title'))
                ->press('#deleted1')
                ->assertDialogOpened('Do you want to delete Category Id= 1')
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
                ->assertDialogOpened('Do you want to delete Category Id= 1')
                ->acceptDialog()
                ->assertSee(__('category.admin.message.del'));
            $this->assertDatabaseMissing('categories',['deleted_at'=>null]);
        });
    }
}
