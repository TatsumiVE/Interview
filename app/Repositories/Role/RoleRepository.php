<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepoInterface
{
  public function get()
  {
    return Role::orderBy('id','desc')->get();
  }
  public function show($id)
  {
    return Role::where('id', $id)->first();
  }
}
