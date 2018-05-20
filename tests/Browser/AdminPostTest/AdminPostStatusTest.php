<?php

namespace Tests\Browser\AdminPostTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminPostStatusTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * test if change post status work.
     *
     * @return void
     */
    public function testChangePostStatus()
    {
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 1)->create();
        factory('App\Models\User', 1)->create();
        factory('App\Models\Post', 1)->states('rating')->create([
            'status' => 0
        ]);
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->click('#update1')
                    ->assertSee(__('common.approve'));
        });
    }

    public function testDeletePost()
    {
        $testContent = 'Post test delete';
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Product', 1)->create();
        factory('App\Models\User', 1)->create();
        factory('App\Models\Post', 1)->states('rating')->create([
            'content' => $testContent
        ]);
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('/admin/posts')
                    ->click('.btn-danger')
                    ->acceptDialog()
                    ->assertDontSee($testContent);
        });
    }
}