<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminListPostTest extends DuskTestCase
{
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

    /**
     * test if search post work.
     *
     * @return void
     */
    public function testSearchPost()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->type('content', 'Lorem')
                    ->clickLink('Go!')
                    // ->click('.search-button')
                    ->assertSee('Search result');
        });
    }
}