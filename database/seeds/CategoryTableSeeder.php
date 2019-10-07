<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('\App\Model\Category');


        for($i = 0;$i < 10;$i++) {
            $word = $faker->sentence($nbWords = 2, $variableNbWords = true);
            \App\Model\Category::insert([
                'name' => $word,
                'slug' => str_slug($word),
                'unique_id' => $faker->uuid,
                'image' => $faker->imageUrl($width = 200, $height = 200),
            ]);

        }

    }
}
