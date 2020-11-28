<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'description' => $faker->name,
        'image' => $faker->imageUrl(),
        'price' =>  $faker->numberBetween(1),
    ];
});