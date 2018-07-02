<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => App\Models\Category::all()->random()->id,
        'name' => $faker->name,
        'preview' => $faker->text($maxNbChars = 200),
        'description' => $faker->text($maxNbChars = 500),
        'price' => $faker->numberBetween($min = 100000, $max = 10000000),
        'quantity' => $faker->numberBetween($min = 1, $max = 50),
        'status' => App\Models\Product::AVAILABLE
    ];
});
