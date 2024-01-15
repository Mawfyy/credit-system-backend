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
        DB::table('users')->insert([
            'name' => "client",
            'email' => "client@gmail.com",
            'password' => Hash::make('client'),
            'account_bank_number' => 1000000000,
            "role" => "Client"
        ]);


        DB::table('users')->insert([
            'name' => "adviser",
            'email' => "adviser@gmail.com",
            'password' => Hash::make('adviser'),
            'account_bank_number' => 2000000000,
            "role" => "Adviser"
        ]);


        DB::table('users')->insert([
            'name' => "manager",
            'email' => "manager@gmail.com",
            'password' => Hash::make('manager'),
            'account_bank_number' => 1200000000,
            "role" => "Manager"
        ]);


        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
            'account_bank_number' => 1300000000,
            "role" => "Super admin"
        ]);
    }
}
