<?php

namespace App\Services\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService implements RoleServiceInterface
{
    public function store($request)
    { 
        $role = Role::create($request);  
        // if (isset($request['permission_name'])) {                  
        //     $role->givePermissionTo($request['permission_name']);
        // }            
        return $role;
    }
    public function update($request, $id)
    {
        $role = Role::where('id', $id)->first();
        $role->update($request);
        // if (isset($request['permission_name'])) {                  
        //     $role->syncPermissions($request['permission_name']);
        // } 
        return $role;
    }

    public function destroy($id)
    {
        $role = Role::where('id', $id)->first();
        return $role->delete();
    }
}
