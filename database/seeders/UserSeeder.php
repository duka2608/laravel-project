<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i <= 30; $i++)
        {
            DB::table('users')->insert([
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "username" => $faker->userName,
                "email" => $faker->email,
                "password" => "f1dc735ee3581693489eaf286088b916",
                "role_id" => 2
            ]);
        }
    }
}
