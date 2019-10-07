<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Wallet::class, function (Faker $faker) {
    return [
        'owner_id' => function(){
            return \App\User::all()->unique()->randomDigit;
        },
        'balance' => $faker->randomNumber(6),
    ];
});
