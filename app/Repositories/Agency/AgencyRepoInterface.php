<?php

namespace App\Repositories\Agency;

interface AgencyRepoInterface
{
  public function get();
  public function show($id);
  public function destroy($id);
}
