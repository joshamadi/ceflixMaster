<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users  = \App\User::all();

        $user_ids = array();

            foreach($users as $user){
                $user_ids[] =  $user->unique_id;
            }

        $faker = Faker::create('\App\Model\Store');

        for($i = 0;$i < 5;$i++) {
            $word = $faker->word;
            \App\Model\Store::insert([
                'owner_id' => $faker->randomElement($user_ids),
                'unique_id' => $faker->uuid,
                'name' => $word." store",
                'slug' => str_slug($word." store"),
                'profile_pic' => $faker->imageUrl($width = 1024, $height = 370),
                'created_at' => $faker->dateTime,
            ]);

        }
    }
}
