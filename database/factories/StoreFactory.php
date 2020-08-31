<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) use ($factory){
    return [
        'name' => $faker->name,
        'document_number' => $faker->randomLetter,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'user_id' => $factory -> create(\App\User::class)->id,
    ];
});
