<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class ValidateAndCreateUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Override function set up database
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class)->create();
    }

    /**
     * Test url create user
     *
     * @return void
     */
    public function testCreateUserUrl()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users')
                ->clickLink(__('messages.adduser'))
                ->pause(1000)
                ->assertPathIs('/admin/users/create')
                ->assertSee(__('user.index.createuser'));
        });
    }

    /**
     * Test validate for input Create User
     *
     * @return array
     */
    public function testUserValidateForInput()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/users/create');
            $browser->press('Submit')
                ->pause(1000)
                ->assertSee('The username field is required.')
                ->assertSee('The email field is required.')
                ->assertSee('The password field is required.')
                ->assertSee('The address must be a string.')
                ->assertSee('The phone must be a string.')
                ->assertSee('The identity card must be a string.')
                ->assertSee('The identity card must be 9 digits.');
        });
    }

    /**
     * Dusk test create user success.
     *
     * @return void
     */
    public function testCreatesUserSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/users/create')
                ->type('username', 'suongmai')
                ->type('email', 'suongmai@gmail.com')
                ->type('password', '123456')
                ->type('full_name', 'luong suong mai')
                ->type('address', 'Quang Nam')
                ->type('phone', '0121324356')
                ->type('identity_card', '205454545')
                ->keys('#dob', '07-07-2000');
            $browser->press('Submit')
                    ->pause(1000)
                    ->assertSee('Create user successfully');
            $this->assertDatabaseHas('users', [
                'username' => 'suongmai',
                'email' => 'suongmai@gmail.com',
            ]);
            $this->assertDatabaseHas('user_info', [
                'full_name' => 'luong suong mai',
                'address' => 'Quang Nam',
                'phone' => '0121324356',
                'identity_card' => '205454545',
                'dob' => '2000-07-07',
             ]);
        });
    }

}
