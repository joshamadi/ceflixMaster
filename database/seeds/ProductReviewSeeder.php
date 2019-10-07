<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = \App\User::all();

        $users_ids  = array();

        foreach ($users  as $user){
            $users_ids[] = $user->unique_id;
        }

        //   ******************** //

        $products = \App\Model\Product::all();

        $products_ids = array();

        foreach ($products as $product){
            $products_ids[] = $product->unique_id;
        }



        $faker = Faker::create('\App\Model\ProductReview');

        for($i = 0;$i < 90;$i++) {
            $word = $faker->word;
            \App\Model\ProductReview::insert([
                'unique_id' => $faker->uuid,
                'user_id' => $faker->randomElement($users_ids),
                'product_id' => $faker->randomElement($products_ids),
                'comments' => $faker->text,
                'ratings' => $faker->numberBetween(1, 5),
            ]);

        }
    }
}
