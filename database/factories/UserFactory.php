<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    $role = \App\Models\Role::where('name', '=', config('roles.customer'))->first();

    return [
        'role_id'           => $role->id,
        'name'              => $faker->firstName,
        'surname'           => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => Hash::make($faker->password),
        'phone'             => $faker->phoneNumber,
        'birth_date'        => $faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
        'remember_token'    => Str::random(10),
    ];
});
