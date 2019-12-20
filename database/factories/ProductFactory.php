<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'      => $faker->words(2, true),
        'price'     => $faker->randomFloat(2, 40, 500),
        'savings'   => $faker->randomFloat(2, 5, 40),
    ];
});
