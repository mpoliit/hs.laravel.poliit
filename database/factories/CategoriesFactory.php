<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title'             => $faker->unique()->word,
        'description'       => $faker->sentences(rand(1,3), true)
    ];
});
