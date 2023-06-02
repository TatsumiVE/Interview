<?php

namespace App\Repositories\Interview;

use App\Models\Assessment;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\InterviewAssign;
use App\Models\Interviewer;
use App\Services\InterviewAssign\InterviewAssignService;
use Illuminate\Support\Facades\DB;

class InterviewRepository implements InterviewRepoInterface
{
    public function get()
    {
        return Candidate::with(['position', 'agency', 'specificLanguages.devlanguage', 'interviews.interviewStage'])
            ->where('status', 0)
            ->orderBy('id','desc')
            ->get();
    }
    // public function show($id)
    // {
    //     view api  for interviewer side
    //     return Interview::with('candidate', 'interviewStage.assessment.assessmentResult.topic', 'interviewStage.assessment.assessmentResult.rate', 'interviewStage.remarks')
    //         ->where('candidate_id', $id)
    //         ->get();
    // }
}
