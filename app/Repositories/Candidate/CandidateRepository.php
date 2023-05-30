<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use App\Models\Interview;

class CandidateRepository implements CandidateRepoInterface
{
  public function get()
  {
    return Candidate::with(['position', 'agency', 'specificLanguages.devlanguage', 'interviews.interviewStage'])
      ->where('status', 0)
      ->orderBy('id')
      ->get();
  }
  public function show($id)
  {
    $data = Candidate::with('specificLanguages.devlanguage')->all();
    $interviewStage = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessment.assessmentResult', 'interviewAssign.remarks')->where('candidate_id', $data->id)->get();
    $result['candidate'] = $data;
    $result['interview'] = $interviewStage;
    dd($result);
    return $result;
    // return Candidate::with(['position', 'agency', 'specificLanguages.devlanguage', 'interviews.interviewStage',])
    // ->where('status', 0)
    // ->where('id', $id)
    // ->first();
  }
}
