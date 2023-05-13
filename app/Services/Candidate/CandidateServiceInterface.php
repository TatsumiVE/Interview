<?php

namespace App\Services\Candidate;

interface CandidateServiceInterface
{
  public function store($data);
  public function update($data, $id);
}
