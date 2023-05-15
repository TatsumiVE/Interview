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
        $hrAdmin = Role::create(['name' => 'Admin']);
        $managementUser=Role::create(['name'=>'ManagementUser']);
        $interviewer=Role::create(['name'=>'Interviewer']);

        // $interview = Permission::create(['name' => 'interview']);
        
        // $hrAdmin->givePermissionTo([$interview]);
        // $managementUser->givePermissionTo([$interview]);
    }
}
