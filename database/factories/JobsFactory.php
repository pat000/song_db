<?php

use Faker\Generator as Faker;

$factory->define(App\Jobs::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'description' => $faker->paragraph,
    ];
});
