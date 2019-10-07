<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SideBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('\App\Model\SideBanner');

        for($i = 0;$i < 3;$i++) {
            \App\Model\SideBanner::insert([
                'unique_id' => $faker->uuid,
                'image' => $faker->imageUrl($width = 270, $height = 420),
                'link'   => $faker->url
            ]);

        }
    }
}
