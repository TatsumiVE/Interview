<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;

class CandidateRepository implements CandidateRepoInterface
{
  public function get()
  {
    return Candidate::with('position', 'agency', 'specificLanguage.devlanguage')
      ->where('status', 0)
      ->get();
  }
  public function show($id)
  {
    return Candidate::with(['position.department', 'agency', 'specificLanguage.devlanguage'])
      ->where('id', $id)->first();
  }
}
