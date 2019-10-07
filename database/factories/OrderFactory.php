<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Order::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return \App\User::all()->unique()->random(10).md5(time());
        },
        'product_id' => function(){
            return Model\Product::all()->unique()->rand(1,10);
        },
        'product_amount' => $faker->randomNumber(6),
        'order_amount' => $faker->randomNumber(6),
        'status' => $faker->numberBetween(0, 1),
    ];
});
