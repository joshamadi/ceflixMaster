<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PromoProductSeeder extends Seeder
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




        $faker = Faker::create('\App\Model\PromoProduct');

        for($i = 0;$i < 5;$i++) {
            \App\Model\PromoProduct::insert([
                'product_id' => $faker->randomElement($products_ids),
                'start_date' => time(),
                'end_date' => time()+ (60*60*24*rand(1,30)),
            ]);

        }
    }
}
