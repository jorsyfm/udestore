<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['LARAVEL','NODE JS','ANGULAR','REACT','REACT NATIVE','IONIC','MYSQL','NOSQL']),
        'description' => $faker->sentence
    ];
});
