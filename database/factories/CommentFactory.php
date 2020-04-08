<?php

/** 
 * 
 * 
 * @var \Illuminate\Database\Eloquent\Factory $factory 
 */

use App\Models\Comment;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'commentable_type' => Department::class,
        'commentable_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
