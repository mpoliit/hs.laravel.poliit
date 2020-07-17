<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    $user = User::all()->random();
    $product = Product::all()->random();
    return [
        'user_id' => $user->id,
        'comment' => implode(' ', $faker->sentences(rand(2,6))),
        'commentable_id' => $product->id,
        'commentable_type' => Product::class
    ];
});
