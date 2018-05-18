<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'post_id' => App\Models\Post::all()->random()->id,
        'content' => $faker->text($maxNbChars = 500) 
    ];
});
