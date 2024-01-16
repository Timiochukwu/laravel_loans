<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        // seed an admin user
        User::create([
            "name"=> "Admin User",
            "email"=> "admin@example.com",
            'role'=> 'admin',
            'status' => 'active',
            'password'=> bcrypt('password'),
        ]);

         // seed an regular user
         User::create([
            "name"=> "Regular User",
            "email"=> "user@example.com",
            'role'=> 'user',
            'status' => 'active',
            'password'=> bcrypt('password'),
        ]);
    }
}
