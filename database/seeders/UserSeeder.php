<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'name' => 'Admin01',
            'email' => 'admin01@admin.com',
            'password' => Hash::make('admin123'),
            'gender' => 'male',
            'date_of_birth' => Carbon::parse('2000-01-01'),
            'country_id' => 1,
            'role' => 'admin',
        ]);
    }
}