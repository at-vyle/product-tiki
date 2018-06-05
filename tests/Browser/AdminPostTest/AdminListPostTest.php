<?php

namespace Tests\Browser\AdminPostTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminListPostTest extends DuskTestCase
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
