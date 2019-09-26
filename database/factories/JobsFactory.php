<?php

use Faker\Generator as Faker;

$factory->define(App\Jobs::class, function (Faker $faker) {

	$title = $faker->unique()->word;
	
    return [
        'title' => $title,
        'description' => $faker->paragraph,
        'slug' => str_slug($title, '-'),
    ];
});
