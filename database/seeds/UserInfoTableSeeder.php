<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\UserInfo', 10)->create();
        $idUsers = User::pluck('id')->toArray();
    }
}
