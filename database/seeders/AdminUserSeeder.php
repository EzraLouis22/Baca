<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            'name' => 'BCA Admin',
            'email' => 'adminPTAS@gmail.com',
            'password' => bcrypt('rahasia123'),
            'role' => 'admin',
            'image' => null,
        ]);
    }
};
