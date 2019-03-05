<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

  $user = App\User::all();
    return [
      "name" => $faker->catchPhrase(),
      "user" => $faker->catchPhrase(),
      "email" => $faker->unique()->safeEmail,
      "password" => $faker->catchPhrase(),

    ];
});
