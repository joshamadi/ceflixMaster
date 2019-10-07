<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HomeSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('\App\Model\HomeSlider');

        for($i = 0;$i < 3;$i++) {
            \App\Model\HomeSlider::insert([
                'unique_id' => $faker->uuid,
                'image' => $faker->imageUrl($width = 1360, $height = 440),
                'link'   => $faker->url
            ]);

        }
    }
}
