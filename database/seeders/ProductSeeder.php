<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => $faker->name,
                'description' => $faker->text(200),
                'price' => $faker->numberBetween(10000, 10000000),
                'photo' => 'Gerry.jpg',
            ]);
        }
    }
}