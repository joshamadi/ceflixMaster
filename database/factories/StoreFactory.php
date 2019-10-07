<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Store::class, function (Faker $faker) {
    return [
        'owner_id' => function(){
            return \App\User::all()->unique()->randomDigit;
        },
        'name' => $faker->word,
        'profile_pic' => $faker->image(null, 100, 200),
    ];
});
