<?php

namespace App\Repositories\Candidate;

interface CandidateRepoInterface
{
  public function get();
  public function show($candidateId);
}
