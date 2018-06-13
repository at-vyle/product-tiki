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
use App\Models\Category;

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
        factory(Category::class)->create();
        factory(Product::class)->create();
        factory(Post::class)->create([
            'user_id' => 2,
            'product_id' => 1,
        ]);
        factory(Order::class)->create();
        factory(Comment::class)->create();
    }

    /**
     * Test click delete user
     *
     * @return void
     */
    public function testCancelConfirmDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/users')
                ->assertSee('Show User')
                ->click('#deleted2 > button')
                ->assertDialogOpened('Do you want to delete ?')
                ->dismissDialog();
            $this->assertDatabaseHas('users', ['id' => 2, 'deleted_at' => null]);
        });
    }

    /**
     * Test click button Delete
     *
     * @return void
     */
    public function testAcceptConfirmDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/users')
                ->click('#deleted2 > button')
                ->assertDialogOpened('Do you want to delete ?')
                ->acceptDialog()
                ->assertSee('Delete User Successfully');
            $this->assertDatabaseMissing('users', ['id' => 2, 'deleted_at' => null])
                ->assertDatabaseMissing('posts', ['user_id'=> 2, 'deleted_at' => null])
                ->assertDatabaseMissing('orders', ['user_id'=> 2, 'deleted_at' => null])
                ->assertDatabaseMissing('comments', ['user_id'=> 2, 'deleted_at' => null]);
        });
    }

    /**
     * Case test Delete User Already Delete
     *
     * @return void
     */
    public function testDeleteUserAlreadyDelete()
    {
        $users = factory(User::class)->create();
        $this->browse(function (Browser $browser) use ($users) {
            $browser->loginAs($this->user)
                    ->visit('/admin/users');
            $users->delete();
            $browser->click('#deleted3 > button')
                ->assertDialogOpened('Do you want to delete ?')
                ->acceptDialog()
                ->assertSee('Sorry, the page you are looking for could not be found.');
        });
    }
}
