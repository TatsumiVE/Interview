<?php

namespace App\Repositories\InterviewProcess;

use App\Models\Interview;
use App\Models\InterviewAssign;
use App\Repositories\InterviewProcess\InterviewProcessRepoInterface;

class  InterviewProcessRepository implements InterviewProcessRepoInterface
{


  public function showAssign($candidateId, $interviewerId)
  {
    $interview = Interview::with('candidate')
      ->whereNull('interview_result')
      ->where('candidate_id', $candidateId)
      ->first();
    $interviewId = $interview->id;
    $interviewAssign = InterviewAssign::where('interview_id', $interviewId)->where('interviewer_id', $interviewerId)->first();
    $interviewAssignId = $interviewAssign->id;
    return InterviewAssign::with(['interviewer.department', 'interviewer.position', 'interview.candidate.position', 'interview.interviewStage'])
      ->where('id', $interviewAssignId)->first();
  }
}
