<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products  = \App\Model\Product::all();

        $products_ids = array();
        $product_path = array();

        foreach($products as $product){
            $products_ids[] =  $product->unique_id;
            $product_path[] =  $product->image;
        }




        $faker = Faker::create('\App\Model\ProductImages');

        for($i = 0;$i < 90;$i++) {
            $word = $faker->word;
            \App\Model\ProductImages::insert([
                'path' => $faker->randomElement($product_path),
                'unique_id' => $faker->uuid,
                'product_id' => $faker->randomElement($products_ids),
            ]);

        }
    }
}
