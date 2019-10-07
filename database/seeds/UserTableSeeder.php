<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('\App\User');

        for($i = 0;$i < 10;$i++) {

            \App\User::insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'unique_id' => $faker->uuid,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);

        }





    }
}
