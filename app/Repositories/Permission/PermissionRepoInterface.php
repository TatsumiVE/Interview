<?php

namespace App\Repositories\Permission;

interface PermissionRepoInterface
{
  public function get();
  public function show($id);

}
