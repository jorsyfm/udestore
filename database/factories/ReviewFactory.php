<?php

use Faker\Generator as Faker;
use App\Course;
// use App\User;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'course_id' => Course::all()->random()->id,
        // 'user_id' => User::all()->random()->id,
        'rating' => $faker->randomFloat(2,1,5),
    ];
});
