<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MostViewedSeeder extends Seeder
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

        foreach($products as $product){
            $products_ids[] =  $product->unique_id;
        }




        $faker = Faker::create('\App\Model\MostView');

        for($i = 0;$i < 20;$i++) {
            \App\Model\MostView::insert([
                'product_id' => $faker->randomElement($products_ids),
                'views' => $faker->numberBetween(0, 200),
            ]);

        }
    }
}
