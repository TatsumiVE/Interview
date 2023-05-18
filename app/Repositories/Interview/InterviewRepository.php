<?php

namespace App\Repositories\Interview;

use App\Models\Assessment;
use App\Models\Interview;
use App\Models\InterviewAssign;
use App\Models\Interviewer;
use App\Services\InterviewAssign\InterviewAssignService;
use Illuminate\Support\Facades\DB;

class InterviewRepository implements InterviewRepoInterface
{
    public function get()
    {
        // return Interview::all();
    }
    public function show($id)
    {
        return Interview::with('candidate', 'interviewStage.assessment.assessmentResult.topic', 'interviewStage.assessment.assessmentResult.rate')->where('candidate_id', $id)->get();
    }
}
