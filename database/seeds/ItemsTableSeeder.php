<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $limit = 2500;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('items')->insert([ //,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->unique()->phoneNumber,
                'email' => $faker->unique()->email,
                'address' => $faker->address,
                'postcode' => $faker->postcode,
                'dob' => date("Y-m-d", $i),
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
