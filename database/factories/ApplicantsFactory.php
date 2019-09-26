<?php

use Faker\Generator as Faker;

$factory->define(App\Applicants::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'resume' => 'resume/'.$faker->name,
        'created_at' => \Carbon\Carbon::now()->subDays(rand(10,100)),
        'job_id' => function () {
            return factory(App\Jobs::class)->create()->id;
        }
        
    ];
});
