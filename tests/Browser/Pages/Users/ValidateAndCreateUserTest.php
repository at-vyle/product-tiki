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
                ->assertSee('The username field is required.')
                ->assertSee('The email field is required.')
                ->assertSee('The password field is required.')
                ->assertSee('The address must be a string.')
                ->assertSee('The phone format is invalid.')
                ->assertSee('The gender field is required.')
                ->assertSee('The identity card format is invalid.');
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
                ->type('username', 'suong')
                ->type('email', 'suongmai@gmail.com')
                ->type('password', '123456')
                ->type('full_name', 'luong suong mai')
                ->type('address', 'Quang Nam')
                ->radio('#gender', '0')
                ->type('phone', '0121324356')
                ->type('identity_card', '205454545')
                ->keys('#dob', '07-07-2000');
            $browser->press('Submit')
                    ->assertSee('Create user successfully');
            $this->assertDatabaseHas('users', [
                'username' => 'suong',
                'email' => 'suongmai@gmail.com',
            ]);
            $this->assertDatabaseHas('user_info', [
                'full_name' => 'luong suong mai',
                'address' => 'Quang Nam',
                'phone' => '0121324356',
                'gender' => '0',
                'identity_card' => '205454545',
                'dob' => '2000-07-07',
             ]);
        });
    }

}
