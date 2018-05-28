<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->state(App\Models\Category::class, 'parent', function (Faker $faker) {
    $category = App\Models\Category::all()->random();
    $id = $category->id;
    $level = (int) $category->level;
    return [
        'name' => $faker->name,
        'parent_id' => $id,
        'level' => $level + 1,
    ];
});
