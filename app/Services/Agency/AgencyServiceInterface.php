<?php

namespace App\Services\Agency;

interface AgencyServiceInterface
{
  public function store($data);
  public function update($data, $id);
}
