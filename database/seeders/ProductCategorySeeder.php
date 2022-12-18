<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products_categories')->insert([
                'product_id' => $faker->unique(true)->numberBetween(1, 10),
                'category_id' => 1
            ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products_categories')->insert([
                'product_id' => $faker->unique(true)->numberBetween(1, 10),
                'category_id' => 2
            ]);
        }
    }
}