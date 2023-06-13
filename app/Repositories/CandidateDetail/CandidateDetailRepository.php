<?php

namespace App\Repositories\CandidateDetail;
use App\Models\Candidate;
use App\Models\Interview;

class CandidateDetailRepository implements CandidateDetailRepoInterface
{
  public function get()
  {
    $candidates = Candidate::with('specificLanguages.devlanguage', 'position', 'agency')
    ->where('status', 0)
    ->orderBy('id', 'desc')
    ->get();

    $result = [];
    foreach ($candidates as $candidate) {
      $interviewStages = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessment.assessmentResult', 'interviewAssign.remarks')
        ->where('candidate_id', $candidate->id)

        ->get();

      $candidateData = [
        'candidate' => $candidate,
        'interview' => $interviewStages,
      ];

      $result[] = $candidateData;
    }
    return $result;
  }

  public function candidatesAll()
  {
    $candidates = Candidate::with('specificLanguages.devlanguage', 'position', 'agency')
    ->orderBy('id', 'desc')
    ->get();

    $result = [];
    foreach ($candidates as $candidate) {
      $interviewStages = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessment.assessmentResult', 'interviewAssign.remarks')
        ->where('candidate_id', $candidate->id)
        ->get();

      $candidateData = [
        'candidate' => $candidate,
        'interview' => $interviewStages,
      ];

      $result[] = $candidateData;
    }
    return $result;
  }
  public function show($id)
  {
    $data = Candidate::with('specificLanguages.devlanguage', 'position', 'agency')->where('id', $id)->first();
    $interviewStage = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessment.assessmentResult', 'interviewAssign.remarks')->where('candidate_id', $data->id)->get();
    $result['candidate'] = $data;
    $result['interview'] = $interviewStage;
    return $result;
  }

}
