<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserInfo;
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
        $idInfo = UserInfo::pluck('user_id')->toArray();
        $inputId = array_diff($idUsers, $idInfo);
        $inputCount = count($inputId);

        for ($i = 0; $i < $inputCount; $i++) {
            factory(App\Models\UserInfo::class,1)->create([
                'user_id' => $faker->unique()->randomElement($inputId),
            ]);
        }

    }
}
