<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use App\Models\UserInfo;

class SortUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        
        factory(User::class, 10)->create();
    }

    /*
     * A Dusk test for click link sort
     *
     * @return void
     */
    public function testClickLinksSort()
    { 
        $sortUsers = ['id', 'fullname'];
        $this->browse(function (Browser $browser) use ($sortUsers) {
            $browser->visit('/admin/users');
            foreach ($sortUsers as $sortUser) {
                $browser->click("#sort-link-$sortUser")
                    ->assertQueryStringMissing('sort', $sortUser)
                    ->assertQueryStringMissing('order', 'asc')
                    ->click("#sort-link-$sortUser")
                    ->assertQueryStringMissing('sort', $sortUser)
                    ->assertQueryStringMissing('order', 'desc');
            }
        });
    }
}
