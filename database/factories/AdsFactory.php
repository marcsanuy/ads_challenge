<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Ad;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->description,
        'publication_date' => $faker->publication_date,
    ];
});
