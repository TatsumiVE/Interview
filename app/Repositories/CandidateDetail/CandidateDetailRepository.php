<?php

namespace App\Repositories\CandidateDetail;

use App\Models\Assessment;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\InterviewStage;
use Illuminate\Support\Facades\DB;

class CandidateDetailRepository implements CandidateDetailRepoInterface
{
  public function get()
  {

    // return Assessment::with('interviewStage', 'candidate', 'interviewer')->get();

    // return Assessment::with('interviewStage.interview.candidate')->get();
    //candidateAPI v1
    // return Assessment::with('interviewStage.interview.candidate.specificLanguage.devlanguage', 'interviewer')->get();

    // return DB::table('interviews')
    //   ->where('candidate_id', 1)
    //   ->orderBy('interview_stage_id')
    //   ->get();

    // return Interview::with('candidate.interview', 'interviewStage')->get();


    // return DB::table('interviews')
    //   ->leftJoin('interview_stages', 'interview_stages.id', '=', 'interviews.interview_stage_id')

    //   ->get();


    // $interviewID = DB::table('interviews')
    //   ->where('interview_stage_id', 1)
    //   ->where('candidate_id', 1)
    //   ->select('id')
    //   ->get();
    // $id = $interviewID->first()->id;

    // $interviewer = DB::table('interview_assigns')
    //   ->where('interview_id', $id)
    //   ->leftJoin('interviewers', 'interviewers.id',  '=', 'interview_assigns.interviewer_id')
    //   ->select('interviewers.id', 'interviewers.name')
    //   ->get();

    // $interviewrId = $interviewer->first()->id;

    // return DB::table('assessments')
    //   ->where('interviewer_id', $interviewrId)
    //   ->leftJoin('assessment_results', 'assessment_results.assessment_id',  '=', 'assessments.id')

    //   ->get();
  }


  public function show($id)
  {
    // return Interview::with('interviewStage', 'candidate', 'position', 'agency')->where('candidate_id', $id)->get();

    return Candidate::with('interviews.interviewStage', 'position', 'agency')->where('id', $id)->get();
  }
}
