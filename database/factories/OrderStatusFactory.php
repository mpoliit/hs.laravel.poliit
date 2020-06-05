<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\OrderStatus::class, function (Faker $faker) {
    return [
        'name'       => $faker->unique()->sentence(rand(1,3), true),
        'type'       => $faker->unique()->word()
    ];
});
