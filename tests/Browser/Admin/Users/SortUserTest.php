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
        factory(User::class, 9)->create();
        for ($i = 1; $i <= 10; $i++) {
            factory(UserInfo::class)->create([
                'user_id' => $i,
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
            $browser->loginAs($this->user)->visit('/admin/users');
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
     * A Dusk test sort user by name
     *
     * @param string $name name of column
     * @param string $order order in database
     * @param string $column column index of column
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortUser($name, $order, $column)
    {
        $this->browse(function (Browser $browser) use ($name, $order, $column) {
            $browser->loginAs($this->user)
                ->visit('admin/users')
                ->click("#sort-link-$name a");

            //Test user Asc
            $arrayAsc = User::join('user_info', 'users.id', 'user_info.user_id')->orderBy($order, 'asc')->pluck($order)->toArray();
            for ($i = 1; $i <= 5; $i++) {
                $selector = "#table-user tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arrayAsc[$i - 1]);
            }

            // Test user Desc
            $browser->click("#sort-link-$name a");
            $arrayDesc = User::join('user_info', 'users.id', 'user_info.user_id')->orderBy($order, 'desc')->pluck($order)->toArray();
            for ($i = 1; $i <= 5; $i++) {
                $selector = "#table-user tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arrayDesc[$i - 1]);
            }
        });
    }

    /**
     * A Dusk test data when panigate.
     *
     * @param string $name name of column
     * @param string $order order in database
     * @param string $column column index of column
     *
     * @dataProvider dataForTest
     *
     * @return void
     */
    public function testSortUsersPanigate($name, $order, $column)
    {
        $this->browse(function (Browser $browser) use ($name, $order, $column) {
            $browser->loginAs($this->user)
                ->visit('admin/users')
                ->click("#sort-link-$name a")
                ->clickLink("2");

            // Test list Asc
            $arrayAsc = User::join('user_info', 'users.id', 'user_info.user_id')->orderBy($order, 'asc')->pluck($order)->toArray();
            $arraySortAsc = array_chunk($arrayAsc, 5)[1];
            for ($i = 1; $i <= 5; $i++) {
                $selector = "#table-user tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arraySortAsc[$i - 1]);
            }

            // Test list Desc
            $browser->click("#sort-link-$name a")
                ->clickLink("2");
            $arrayDesc = User::join('user_info', 'users.id', 'user_info.user_id')->orderBy($order, 'desc')->pluck($order)->toArray();
            $arraySortDesc = array_chunk($arrayDesc, 5)[1];
            for ($i = 1; $i <= 5; $i++) {
                $selector = "#table-user tbody tr:nth-child($i) td:nth-child($column)";
                $this->assertEquals($browser->text($selector), $arraySortDesc[$i - 1]);
            }
        });
    }
}
