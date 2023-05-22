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
use Illuminate\Support\Facades\DB;

class CandidateDetailRepository implements CandidateDetailRepoInterface
{
  public function get()
  {

  }


  public function show($id)
  {

    // return Interview::with('interviewAssign.interviewer.position.department', 'InterviewStage.assessment.assessmentResult.topic', 'InterviewStage.assessment.assessmentResult.rate', 'candidate.position.department', 'interviewAssign.remarks')
    //   ->where('candidate_id', $id)
    //   ->get();
    return Interview::with('candidate.position.department', 'interviewStage.interview.interviewAssign.assessments.assessmentResult.topic', 'interviewStage.interview.interviewAssign.assessments.assessmentResult.rate', 'interviewAssign.interviewer.position.department', 'interviewAssign.remarks')->where('candidate_id', $id)->get();
  }
}



