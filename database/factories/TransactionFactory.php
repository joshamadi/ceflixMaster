<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Transaction::class, function (Faker $faker) {
    return [
        'order_id' => function(){
            return Model\Order::all()->unique()->randomDigit;
        },
        'user_id' => function(){
            return \App\User::all()->unique()->randomDigit;
        },
        'amount' => $faker->randomNumber(6),
        'reference' => $faker->sentence,
        'status' => $faker->randomNumber(0, 1),
    ];
});
