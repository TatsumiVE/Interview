<?php

namespace App\Repositories\CandidateInterviewRate;

use App\Models\Assessment;

class CandidateInterviewRateRepository implements CandidateInterviewRateRepoInterface
{
  public function show($id)
  {
    return Assessment::with('interviewStage.remarks', 'interviewer', 'assessmentResult.topic',
    'assessmentResult.rate')->where('candidate_id', $id)->get();
    // return Assessment::with('interviewStage.remarks', 'interviewer', 'assessmentResult.topic', 'assessmentResult.rate')->where('candidate_id', $id)->get();


  }
}
