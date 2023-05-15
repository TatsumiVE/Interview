<?php

namespace App\Repositories\Permission;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepoInterface
{
  public function get(){
    return Permission::all();
  }
  public function show($id){
    return Permission::where('id',$id)->first();
  }

}
