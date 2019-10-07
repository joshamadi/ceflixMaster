<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories  = \App\Model\Category::all();

        $category_ids = array();

        foreach($categories as $category){
            $category_ids[] =  $category->unique_id;
        }




        $faker = Faker::create('\App\Model\BestCategory');

        for($i = 0;$i < 8;$i++) {
            \App\Model\BestCategory::insert([
                'category_id' => $faker->randomElement($category_ids),
            ]);

        }
    }
}
