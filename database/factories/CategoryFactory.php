<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->state(App\Models\Category::class, 'parent', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'parent_id' => App\Models\Category::all()->random()->id,
    ];
});
