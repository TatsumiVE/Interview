<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'is_active' => 1
        ]);
        $admin = User::create([
            'name' => 'David',
            'email' => 'david@gmail.com',
            'password' => Hash::make('password'),
            'is_active' => 1
        ]);

        $moderator = User::create([
            'name' => 'Mary',
            'email' => 'mary@gmail.com',
            'password' => Hash::make('password'),
            'is_active' => 1
        ]);

        $super_admin->assignRole('SuperAdmin');
        $admin->assignRole('Admin');
        $moderator->assignRole('Moderator');        
    }
}
