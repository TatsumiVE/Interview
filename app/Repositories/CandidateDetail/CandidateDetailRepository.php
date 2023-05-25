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
  }


  public function show($id)
  {


    // $data = Candidate::where('id', $id)->with('interviews.interviewStage', 'interviews.interviewAssign.interviewer.position', 'interviews.interviewAssign.interviewer.department', 'interviews.assessment.assessmentResults.topic', 'interviews.assessment.assessmentResults.rate')->first();

    // $result['candidate'] = $data;
    // $result['interview'] = $data->interviews;

    // return $result;


    $data = Candidate::with('specificLanguages.devlanguage')->where('id', $id)->first();
    $interviewStage = Interview::with('interviewStage', 'interviewAssign.interviewer.position', 'interviewAssign.interviewer.department', 'interviewAssign.assessments.assessmentResult.topic', 'interviewAssign.assessments.assessmentResult.rate', 'interviewAssign.remarks')->where('candidate_id', $data->id)->get();
    $result['candidate'] = $data;
    $result['interview'] = $interviewStage;
    return $result;
  }
}
