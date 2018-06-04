<?php

namespace Tests\Browser\AdminPostTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Post;

class AdminSortPostTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 10)->create();
        factory('App\Models\User', 10)->create();
        factory('App\Models\Post', 5)->states('comment')->create();
    }

    /**
     * test sort Post by username.
     *
     * @return void
     */
    public function testSortPostByUsername()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->click('#sort-by-username');

            $postsSortDesc = Post::join('users', 'posts.user_id', 'users.id')
                            ->orderBy('username', 'desc')->pluck('username')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = "#post-table tbody tr:nth-child($i) td:nth-child(2)";
                $this->assertEquals($browser->text($selector), $postsSortDesc[$i-1]);
            }

            $browser->click('#sort-by-username');
            $postsSortAsc = Post::join('users', 'posts.user_id', 'users.id')
                            ->orderBy('username', 'asc')->pluck('username')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = "#post-table tbody tr:nth-child($i) td:nth-child(2)";
                $this->assertEquals($browser->text($selector), $postsSortAsc[$i-1]);
            }
        });
    }

    /**
     * test sort Post by username.
     *
     * @return void
     */
    public function testSortPostByProductName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->click('#sort-by-product-name');

            $postsSortDesc = Post::join('products', 'posts.product_id', 'products.id')
                            ->orderBy('name', 'desc')->pluck('name')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = "#post-table tbody tr:nth-child($i) td:nth-child(3)";
                $this->assertEquals($browser->text($selector), $postsSortDesc[$i-1]);
            }

            $browser->click('#sort-by-product-name');
            $postsSortAsc = Post::join('products', 'posts.product_id', 'products.id')
                            ->orderBy('name', 'asc')->pluck('name')->toArray();

            for ($i = 1; $i <= 5; $i++) {
                $selector = "#post-table tbody tr:nth-child($i) td:nth-child(3)";
                $this->assertEquals($browser->text($selector), $postsSortAsc[$i-1]);
            }
        });
    }
}
