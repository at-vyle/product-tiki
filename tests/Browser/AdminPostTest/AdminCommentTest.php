<?php

namespace Tests\Browser\AdminPostTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminCommentTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * test if comment list show.
     *
     * @return void
     */
    public function testCommentList()
    {
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 1)->create();
        factory('App\Models\User', 1)->create();
        factory('App\Models\Post', 1)->states('rating')->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->press('#view1')
                    ->assertSee(__('post.admin.show.subtitle'));
        });
    }

    /**
     * test if search post work.
     *
     * @return void
     */
    public function testSearchComment()
    {
        $testContent = 'dkashkdjhdasndjkashdkjah';
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 1)->create();
        factory('App\Models\User', 1)->create();
        factory('App\Models\Post', 1)->states('rating')->create();
        factory('App\Models\Comment', 10)->create([
            'content' => $testContent
        ]);
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('/admin/posts')
                    ->press('#view1')
                    ->type('content', $testContent)
                    ->press(__('post.admin.list.go'))
                    ->assertSee($testContent);
        });
    }
}