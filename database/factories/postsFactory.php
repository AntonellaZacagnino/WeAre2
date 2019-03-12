<?php

use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    return [
        'postText' => $faker->text($maxNbChars = 200),
        'user_id' => $faker->numberBetween($min = 1, $max = 300),
    ];
});
