<?php

use Faker\Generator as Faker;

$factory->define(App\Models\NoteOrder::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'order_id' => App\Models\Order::all()->random()->id,
        'note' => $faker->text($maxNbChars = 200) 
    ];
});