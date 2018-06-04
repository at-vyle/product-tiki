<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator as Faker;

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
        $userIds = factory(User::class, 5)->create();
        for ($i = 0; $i < 5; $i++) {
            factory(UserInfo::class)->create([
                'user_id' => $i+1,     
            ]);
        }
    }

    /*
     * A Dusk test for click link sort
     *
     * @return void
     */
    public function testClickLinksSort()
    { 
        $sortUsers = ['id', 'full_name'];
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

    /**
     * Make cases for test.
     *
     * @return array
     */
    public function dataForTest()
    {
        return [
            ['id', 'users.id', 1],
            ['full_name', 'user_info.full_name', 4],
        ];
    }

    /**
     * A Dusk test data sort list user by name
     * 
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortListUser($name, $order, $column)
    {
        $this->browse(function (Browser $browser) use ($name, $order, $column) {
            $browser->visit('admin/users')
                ->click("#sort-link-$name a");

            //Test list user Asc
            $arrayAsc = User::join('user_info', 'users.id', 'user_info.user_id')->orderBy($order, 'asc')->pluck($order)->toArray();
            for ($i = 1; $i <= 5; $i++) {
                $selector = "#table-user tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arrayAsc[$i - 1]);
            }
            // Test list user Desc
            $browser->click("#sort-link-$name a");
            $arrayDesc = User::join('user_info', 'users.id', 'user_info.user_id')->orderBy($order, 'desc')->pluck($order)->toArray();
            for ($i = 1; $i <= 5; $i++) {
                $selector = "#table-user tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arrayDesc[$i - 1]);
            }
        });
    }
}
