<?php

namespace App\Repositories\InterviewAssessment;

use App\Models\Interview;
use App\Models\InterviewAssign;

class  InterviewAssessmentRepository implements InterviewAssessmentRepoInterface
{

  public function show($candidateId, $interviewerId)
  {
    $interview = Interview::with('candidate')
      ->whereNull('interview_result')
      ->where('candidate_id', $candidateId)
      ->first();
    $interviewId = $interview->id;
    $interviewAssign = InterviewAssign::where('interview_id', $interviewId)->where('interviewer_id', $interviewerId)->first();
    $interviewAssignId = $interviewAssign->id;
    return $interviewAssignId;
  }
}
