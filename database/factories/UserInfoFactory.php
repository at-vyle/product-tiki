<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\UserInfo::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->unique()->random()->id,
        'full_name' => $faker->name,
        'avatar' => 'img.jpg',
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'identity_card' => $faker->numberBetween($min = 1000000000, $max = 999999999),
    ];
});