<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email,
        'quantity' => rand(1, 10),
        'price' => rand(2500, 10000),
        'photo' => $faker->imageUrl(),
        'accepted' => false
    ];
});
