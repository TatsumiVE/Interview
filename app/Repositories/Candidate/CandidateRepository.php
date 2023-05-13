<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;

class CandidateRepository implements CandidateRepoInterface
{
  public function get()
  {
    return Candidate::with(['position', 'agency'])->get();
  }
  public function show($id)
  {
    return Candidate::with(['position', 'agency'])->where('id', $id)->first();
  }
}
