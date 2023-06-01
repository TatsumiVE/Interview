<?php

namespace App\Repositories\Department;

use App\Models\Department;
use App\Repositories\Department\DepartmentRepoInterface;
use Spatie\Permission\Models\Role;

class DepartmentRepository implements DepartmentRepoInterface
{
  public function get()
  {
    return Department::orderBy('id','desc')->get();
  }
  public function show($id)
  {
    return Department::where('id', $id)->first();
  }
}
