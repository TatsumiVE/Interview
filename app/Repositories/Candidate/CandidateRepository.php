<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;

class CandidateRepository implements CandidateRepoInterface
{
  public function get()
  {
    return Candidate::with('position', 'agency', 'specificLanguage.language')->get();
  }
  public function show($id)
  {
    return Candidate::with(['position', 'agency', 'specificLanguage'])->where('id', $id)->first();
  }
}
