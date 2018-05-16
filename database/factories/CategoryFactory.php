
<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) 
{
    return [
    ];
});

$factory->state(App\Models\Category::class, 'parent', function (Faker $faker) 
{
    return [
        'parent_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});