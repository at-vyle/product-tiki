<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    $status = $faker->numberBetween($min = 0, $max = 3);
    if ($status) {
        $text = $faker->text($maxNbChars = 500);
    } else {
        $text = '';
    }
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'status' => $status,
        'note' => $text
    ];
});
