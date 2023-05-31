<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepoInterface
{
  public function get()
  {
    return Role::orderBy('id')->get();
  }
  public function show($id)
  {
    return Role::where('id', $id)->first();
  }
}
