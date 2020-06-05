<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    return [
        'user_id'       => rand(2, 5),
        'user_name'     => $faker->firstName,
        'user_surname'  => $faker->lastName,
        'user_email'    => $faker->safeEmail,
        'user_phone'    => $faker->phoneNumber,
        'country'       => $faker->country,
        'city'          => $faker->city,
        'address'       => $faker->address,
        'total'         => rand(1, 5),
        'status_id'     => rand(1, 5)
    ];
});
