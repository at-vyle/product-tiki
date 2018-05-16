<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [

    ];
});

$factory->state(App\Models\Post::class, 'rating', function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'user_id' => App\Models\User::all()->random()->id,
        'type' => App\Models\Post::TYPE_REVIEW,
        'content' => $faker->text($maxNbChars = 500),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});

$factory->state(App\Models\Post::class, 'comment', function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'user_id' => App\Models\User::all()->random()->id,
        'type' => APP\Models\Post::TYPE_COMMENT,
        'content' => $faker->text($maxNbChars = 500),
        'status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
