<?php

namespace App\Repositories\InterviewDetail;

use App\Models\Candidate;



class InterviewDetailRepository implements InterviewDetailRepoInterface{
public function get()
{
    $candidates = Candidate::with(['position', 'assessment.interviewer', 'assessment.rates', 'assessment.interviewStage'])
        ->join('interviews', 'candidates.id', '=', 'interviews.candidate_id')
        ->join('assessment', 'candidates.id', '=', 'assessment.candidate_id')
        ->join('interview_stages', 'interviews.interview_stages_id', '=', 'interview_stages.id')
        ->join('interview_assigns', 'interviews.id', '=', 'interview_assigns.interview_id')
        ->join('interviewers', 'interview_assigns.interviewer_id', '=', 'interviewers.id')
        ->select('candidates.name as CandidateName', 'interview_stages.stage_name as Stage', 'rates.name as Rate', 'positions.name as Position', 'interviewers.name as Interviewer')
        ->get();

    return $candidates;
}
}
