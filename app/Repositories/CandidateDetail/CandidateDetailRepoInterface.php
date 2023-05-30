<?php

namespace App\Repositories\CandidateDetail;

interface CandidateDetailRepoInterface
{
  public function get();

  public function getCandidatesByStageName($stageName);

  public function show($id);
}
