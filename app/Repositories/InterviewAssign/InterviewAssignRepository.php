<?php

namespace App\Repositories\InterviewAssign;

use App\Models\InterviewAssign;

class InterviewAssignRepository implements InterviewAssignRepoInterface

{

  public function get()
  {
    // return InterviewAssign::with('interviewer', 'interview.candidate.position', 'interview.interviewStage')->get();
  }
  public function show($id)
  {
    return InterviewAssign::with(['interviewer', 'interview.candidate.position', 'interview.interviewStage'])
      ->where('id', $id)->first();
  }
}
