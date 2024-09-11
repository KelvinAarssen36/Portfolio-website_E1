<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'administrator' => true, // Zet deze gebruiker als admin
        ]);

        User::create([
            'name' => 'Kelvin',
            'email' => 'Kelvin@aarssen.info',
            'password' => bcrypt('password'),
            'administrator' => true, // Zet deze gebruiker als admin
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'administrator' => false, // Standaard gebruiker
        ]);
    }
}
