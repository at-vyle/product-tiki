<?php

namespace Tests\Browser\AdminPostTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminCommentTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $testContent = 'dkashkdjhdasndjkashdkjah';
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 1)->create();
        factory('App\Models\User', 1)->create();
        factory('App\Models\Post', 1)->states('rating')->create();
        factory('App\Models\Comment', 1)->create([
            'content' => $this->testContent
        ]);
        factory('App\Models\Comment', 10)->create();
    }

    /**
     * test if comment list show.
     *
     * @return void
     */
    public function testCommentList()
    {
        
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
        $test = $this->testContent;
        $this->browse(function (Browser $browser) use ($test) {
            $browser->visit('/admin/posts')
                    ->press('#view1')
                    ->type('content', $test)
                    ->press(__('post.admin.list.go'))
                    ->assertSee($test);
        });
    }
}