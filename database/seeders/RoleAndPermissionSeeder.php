<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'SuperAdmin']);
        $managementUser=Role::create(['name'=>'ManagementUser']);

        $candidate = Permission::create(['name' => 'candidate']);
        $superAdmin->givePermissionTo([$candidate]);
        $managementUser->givePermissionTo([$candidate]);
    }
}
