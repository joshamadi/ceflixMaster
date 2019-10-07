<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\User::class,10)->create();
        factory(\App\Model\Category::class,5)->create();
        factory(\App\Model\Order::class,10)->create();
        factory(\App\Model\Transaction::class,10)->create();
        factory(\App\Model\Product::class,10)->create();
        factory(\App\Model\Wallet::class,10)->create();
        factory(\App\User::class,10)->create()->each(function($user){
            return $user->store()->save(factory(\App\Model\Store::class)->make());
        });
    }
}
