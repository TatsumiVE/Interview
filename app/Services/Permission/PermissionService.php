<?php 

namespace App\Services\Permission;

use Spatie\Permission\Models\Permission;

class PermissionService implements PermissionServiceInterface{
    public function store($request){
        return Permission::create($request);
    }
    public function update($request,$id){
        $permission=Permission::where('id',$id)->first();
        return $permission->update($request);
    }

    public function destroy($id){
        $permission=Permission::where('id',$id)->first();
        return $permission->delete();
    }
}