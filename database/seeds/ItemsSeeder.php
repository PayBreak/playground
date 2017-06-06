<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * @author EB
 * Class ItemsSeeder
 */
class ItemsSeeder extends Seeder
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
            $item = new \App\Stack\Item();
            $item->name = implode(" ", $faker->words($faker->numberBetween(1,4)));
            $item->description = $faker->sentence;
            $item->revoked = $faker->boolean;
            $item->created_at = date("Y-m-d H:i:s");
            $item->created_at = date("Y-m-d H:i:s");
            $item->save();
        }
    }
}
