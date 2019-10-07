<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SponsoredProductSeeder extends Seeder
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




        $faker = Faker::create('\App\Model\SponsoredProduct');

        for($i = 0;$i < 3;$i++) {
            \App\Model\SponsoredProduct::insert([
                'product_id' => $faker->randomElement($products_ids),
            ]);

        }
    }
}
