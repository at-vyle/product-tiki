<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use App\Models\Post;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Product;

class DeleteUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Override function set up database
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class)->create([
            'id' => 2,
            'email' => 'mailuong@gmail.com',
            'username' => 'MaiMai',
            'role' => 0
        ]);
        factory(Product::class)->create();
        factory(Post::class)->create();
        factory(Order::class)->create([
            'product_id' => 1,
        ]);
        factory(Comment::class)->create();
    }

    /**
     * Test click delete user
     *
     * @return void
     */
    public function testClickDeleleUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users')
                ->assertSee('Show User')
                ->click('form #btn-delete')
                ->assertDialogOpened('Do you want to delete ?')
                ->dismissDialog();
            $this->assertDatabaseHas('users',['deleted_at' => null]);
        });
    }

    /**
     * Test click button Delete
     *
     * @return void
     */
    public function testButtonDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users')
                ->click('form button.btn-danger')
                ->assertDialogOpened('Do you want to delete ?')
                ->acceptDialog()
                ->assertSee('Delete User Successfully');
            $this->assertDatabaseMissing('users', ['id' => 2, 'deleted_at' => null])
                ->assertDatabaseMissing('posts', ['user_id'=> 2, 'deleted_at' => null])
                ->assertDatabaseMissing('orders', ['user_id'=> 2, 'deleted_at' => null])
                ->assertDatabaseMissing('comments', ['user_id'=> 2, 'deleted_at' => null]);
        });
    }  
}
