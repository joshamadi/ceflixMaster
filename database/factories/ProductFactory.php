<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Product::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'store_id' => function(){
            return Model\Store::all()->unique()->randomDigit;
        },
        'category_id' => function(){
            return Model\Category::all()->unique()->randomDigit;
        },
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->text,
        'price' => $faker->randomNumber(6),
        'status' => $faker->randomNumber(0, 1),
        'image' => $faker->image(null, 200, 200),

    ];
});
