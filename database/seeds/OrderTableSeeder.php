<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder
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




        $products  = \App\Model\Product::all();

        $products_ids = array();

        $product_amounts = array();

        foreach($products as $product){
            $products_ids[] =  $product->unique_id;
            $product_amounts[] = $product->price;
        }






        $faker = Faker::create('\App\Model\Store');

        for($i = 0;$i < 20;$i++) {
            $word = $faker->word;
            \App\Model\Order::insert([
                'user_id' => $faker->randomElement($user_ids),
                'unique_id' => $faker->uuid,
                'product_id' => $faker->randomElement($products_ids),
                'product_amount' => $faker->randomElement($product_amounts),
                'order_amount' => $faker->randomNumber(4),
                'status' => $faker->boolean,
                'created_at' => $faker->dateTime

            ]);

        }
    }
}
