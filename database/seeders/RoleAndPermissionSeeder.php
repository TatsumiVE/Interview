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

        $interview = Permission::create(['name' => 'interview']);
        
        $superAdmin->givePermissionTo([$interview]);
        $managementUser->givePermissionTo([$interview]);
    }
}
