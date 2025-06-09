<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ezra Louis',
            'email' => 'ezralouis@gmail.com',
            'password' => bcrypt('ezra22'),
            'profile_picture' => 'default.png',
        ]);
    }
}
