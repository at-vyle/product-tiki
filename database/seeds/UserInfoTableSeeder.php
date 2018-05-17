<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $idUsers = User::pluck('id')->toArray();
        factory('App\Models\UserInfo', 10)->create([
            'user_id' => $faker->randomElement($idUsers)
        ]);
    }
}
