<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Ad;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 50),
        'description' => $faker->text($maxNbChars = 100),
        'publication_date' => $faker->date,
    ];
});
