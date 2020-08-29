<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ranking;
use Faker\Generator as Faker;

$factory->define(Ranking::class, function (Faker $faker) use ($factory){
    return [
        'rating' => $faker->randomDigit,
        'comment' => $faker->randomDigit,
        'product_id' => $factory->create(\App\Product::class)->id,
    ];
});
