<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;

class CandidateRepository implements CandidateRepoInterface
{
  public function get()
  {
    return Candidate::with('position', 'agency', 'specificLanguages.devlanguage')
      ->where('status', 0)
      ->orderBy('id')
      ->get();
  }
  public function show($id)
  {
    return Candidate::with(['position', 'agency', 'specificLanguages.devlanguage'])
      ->where('id', $id)->first();
  }
}
