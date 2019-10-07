<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeopleChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('\App\Model\PeoplesChoice');

        for($i = 0;$i < 4;$i++) {
            \App\Model\PeoplesChoice::insert([
                'unique_id' => $faker->uuid,
                'image' => $faker->imageUrl($width = 870, $height = 355),
                'link'   => $faker->url
            ]);

        }
    }
}
