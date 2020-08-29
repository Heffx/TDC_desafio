<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) use ($factory){
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat('2',0, 50),
        'amount' => $faker->randomDigit(),
        'store_id' => $factory -> create(\App\Store::class)->id,
    ];
});
