<?php

namespace App\Services\Department;

use App\Models\Department;

class DepartmentService implements DepartmentServiceInterface
{
  public function store($request)
  {
    return Department::create($request);
  }
  public function update($request, $id)
  {
    $department = Department::where('id', $id)->first();
    return $department->update($request);
  }

  public function destroy($id){
    $department = Department::where('id', $id)->first();
    return $department->delete();
  }
}
