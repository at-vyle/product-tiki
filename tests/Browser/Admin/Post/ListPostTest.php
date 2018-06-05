<?php

namespace Tests\Browser\Admin\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListPostTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * test if post list work.
     *
     * @return void
     */
    public function testAdminPostList()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->assertSee('All Posts');
        });
    }
}
