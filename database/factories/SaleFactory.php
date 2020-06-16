<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(100, 15000),
        'products' => $faker->numberBetween(1, 10),
        'product' => $faker->randomElement([
            'Schuh',
            'T-shirt',
            'Pullover',
        ]),
        'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now')
    ];
});
