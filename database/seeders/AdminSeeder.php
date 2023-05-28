<?php

namespace Database\Seeders;

use App\Models\User;
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
            'interviewer_id'=>1,
            'password' => Hash::make('password'),

        ]);
        $admin = User::create([
            'interviewer_id'=>2,
            'password' => Hash::make('password'),

        ]);

        $moderator = User::create([
            'interviewer_id'=>3,
            'password' => Hash::make('password'),

        ]);

        $super_admin->assignRole('SuperAdmin');
        $admin->assignRole('Admin');
        $moderator->assignRole('Moderator');
    }
}
