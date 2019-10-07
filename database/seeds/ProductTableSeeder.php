<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stores  = \App\Model\Store::all();

        $store_ids = array();

        foreach($stores as $store){
            $store_ids[] =  $store->unique_id;
        }



        $categories  = \App\Model\Category::all();

        $category_ids = array();

        foreach($categories as $category){
            $category_ids[] =  $category->unique_id;
        }





        $faker = Faker::create('\App\Model\Product');

        for($i = 0;$i < 30;$i++) {
            $title = $faker->sentence($nbWords = 3, $variableNbWords = true);
            \App\Model\Product::insert([
                'title' => $title,
                'slug' => str_slug($title),
                'store_id' => $faker->randomElement($store_ids),
                'category_id' => $faker->randomElement($category_ids),
                'unique_id' => $faker->uuid,
                'description' => $faker->text,
                'price' => $faker->randomNumber(3),
                'image' => $faker->imageUrl($width = 200, $height = 200),
                'status' => $faker->boolean,
            ]);

        }
    }
}
