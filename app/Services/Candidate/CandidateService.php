<?php

namespace App\Services\Candidate;

use App\Models\Candidate;

class CandidateService implements CandidateServiceInterface
{
  public function store($data)
  {

    return Candidate::create($data);
  }
  public function update($data, $id)
  {

    $result = Candidate::where('id', $id)->first();
    return $result->update($data);
  }
}
