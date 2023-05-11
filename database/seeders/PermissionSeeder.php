<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $super_Admin = Role::create(['name' => 'SuperAdmin']);

        // $candidate = Permission::create(['name' => 'candidate']);
        // $super_Admin->givePermissionTo([$candidate]);
    }
}
