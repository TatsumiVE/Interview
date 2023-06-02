<?php

namespace App\Repositories\CandidateDetail;

interface CandidateDetailRepoInterface
{
  public function get();
  public function show($id);
  public function candidatesAll();
}
