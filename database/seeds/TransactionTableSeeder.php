<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionTableSeeder extends Seeder
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




        $orders  = \App\Model\Order::all();

        $orders_ids = array();
        $orders_amount = array();

        foreach($orders as $order){
            $orders_ids[] =  $order->unique_id;
            $orders_amount[] =  $order->order_amount;
        }




        $faker = Faker::create('\App\Model\Transaction');

        for($i = 0;$i < 20;$i++) {
            $word = $faker->word;
            \App\Model\Transaction::insert([
                'user_id' => $faker->randomElement($user_ids),
                'unique_id' => $faker->uuid,
                'order_id' => $faker->randomElement($orders_ids),
                'amount' => $faker->randomElement($orders_amount),
                'reference' => $faker->sentence,
                'status' => $faker->boolean,
                'created_at' => $faker->dateTime

            ]);

        }
    }
}
