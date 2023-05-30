<?php

namespace App\Services\Department;

interface DepartmentServiceInterface
{
  public function store($request);
  public function update($request, $id);
}
