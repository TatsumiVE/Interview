<?php

namespace App\Services\Agency;

use App\Models\Agency;
use App\Services\Agency\AgencyServiceInterface;

class AgencyService implements AgencyServiceInterface
{
  public function store($data)
  {

    return Agency::create($data);
  }
  public function update($data, $id)
  {

    $result = Agency::where('id', $id)->first();
    return $result->update($data);
  }
}
