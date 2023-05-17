<?php

namespace App\Repositories\CandidateDetail;

use App\Models\Assessment;


class CandidateDetailRepository implements CandidateDetailRepoInterface
{
  public function get()
  {
    // return Interview::with('candidate', 'intervieStages')->get();
    return Assessment::with('interviewStage', 'candidate', 'interviewer')->get();
  }
}
