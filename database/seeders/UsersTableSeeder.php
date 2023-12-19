<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('password')
        ]);

            //create a regular user
        User::create([
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'role' => 'user',
                'status' => 'active',
                'password' => Hash::make('password')
        ]);
    }
}
