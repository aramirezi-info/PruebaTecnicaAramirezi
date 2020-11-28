<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->name,
        'customer_email' => $faker->email,
        'customer_mobile' =>  $faker->randomNumber(),
        'product_id' => function() {
            return factory(Product::class)->create()->id;
        },
        'transaction_id' => $faker->randomNumber(),
        'status' => $faker->randomElement($array = array ('CREATED','APPROVED','PAYED','REJECTED','PENDING'))
    ];
});
