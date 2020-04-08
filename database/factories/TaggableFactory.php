<?php

/** 
 * 
 * 
 * @var \Illuminate\Database\Eloquent\Factory $factory 
 */

use App\Models\Taggable;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Taggable::class, function (Faker $faker) {
    return [
        'tag_id' => $faker->numberBetween($min = 1, $max = 25),
        'taggable_type' => Department::class,
        'taggable_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
