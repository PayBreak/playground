<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ConsumersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            $consumer = new \App\Stack\Consumers();
            $consumer->title = $faker->title;
            $consumer->first_name = $faker->firstName;
            $consumer->last_name = $faker->lastName;
            $consumer->date_of_birth = $faker->date('Y-m-d', '2000-01-01');
            $consumer->email = $faker->unique()->email;
            $consumer->password = $faker->password();
            $consumer->created_at = date("Y-m-d H:i:s");
            $consumer->save();
        }
    }
}
