<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(100, 15000),
        'products' => $faker->numberBetween(1, 10),
        'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now')
    ];
});
