<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\UserInfo;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(UserInfo::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->randomElement(User::pluck('id')->toArray()),
        'full_name' => $faker->name,
        'avatar' => 'img.jpg',
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'identity_card' => $faker->numberBetween($min = 1000000000, $max = 999999999),
    ];
});