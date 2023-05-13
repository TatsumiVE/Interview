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
        $superAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_active' => 1
        ]);
        $managementUser = User::create([
            'name' => 'smith',
            'email' => 'smith@gmail.com',
            'password' => Hash::make('password'),
            'is_active' => 1
        ]);

        $superAdmin->assignRole('SuperAdmin');
        $managementUser->assignRole('ManagementUser');
    }
}
