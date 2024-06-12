<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            DB::table('user')->insert([
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('password'),
            ]);
            DB::table('user')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ]);
            DB::table('user')->insert([
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
            ]);
    }
}
