<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;

class CandidateRepository implements CandidateRepoInterface
{
  public function get()
  {
    return Candidate::with(['position', 'agency', 'specificLanguages.devlanguage', 'interviews.interviewStage'])
      ->where('status', 0)
      ->orderBy('id')
      ->get();
  }
  public function show($candidateId)
  {


    return Candidate::with(['position', 'agency', 'specificLanguages.devlanguage', 'interviews.interviewStage'])
      ->where('status', 0)
      ->where('id', $candidateId)
      ->first();
  }
}
