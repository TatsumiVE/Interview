<?php

namespace App\Repositories\CandidateDetail;

use App\Models\Rate;
use App\Models\Topic;
use App\Models\Remark;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\Assessment;
use App\Models\Interviewer;
use App\Models\InterviewStage;
use App\Models\InterviewAssign;
use App\Models\AssessmentResult;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CandidateDetailRepository implements CandidateDetailRepoInterface
{
  public function get()
  {
    $candidates = Candidate::with('specificLanguages.devlanguage')->get();

    $result = [];
    foreach ($candidates as $candidate) {
      $interviewStages = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessment.assessmentResult', 'interviewAssign.remarks')
        ->where('candidate_id', $candidate->id)
        ->orderBy('id'.'desc')
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
    $data = Candidate::with('specificLanguages.devlanguage')->where('id', $id)->first();
    $interviewStage = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessment.assessmentResult', 'interviewAssign.remarks')->where('candidate_id', $data->id)->get();
    $result['candidate'] = $data;
    $result['interview'] = $interviewStage;
    return $result;
  }





  //   public function show($id)
  // {
  //     $data = Candidate::where('id', $id)->first();
  //     $interviewStage = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department')->where('candidate_id', $data->id)->get();

  //     $result['candidate'] = $data;
  //     $result['interview'] = $interviewStage;

  //     // Retrieve assessment and remarks for each interview stage
  //     foreach ($interviewStage as $stage) {

  //         $assessment = Assessment::with('assessmentResult.topic', 'assessmentResult.rate')->where('interview_stage_id', $stage->interview_stage_id)->get();
  //         // $remarks = Remark::where('interview_assign_id', $stage->interview_assign->id)->get();

  //         // if ($assessment) {
  //         //     $stage->assessment = $assessment;
  //         // }

  //     return $assessment;
  //     }

  //     // return $result;
  // }

}
