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
        return Candidate::with('specificLanguages.devlanguage', 'interviews.interviewStage.assessment.assessmentResult.topic', 'interviews.interviewStage.assessment.assessmentResult.rate')
            ->where('status', 1)
            ->get();


        // return Candidate::with(['interviews.interviewStage' => function ($query) {
        //     $query->select('id', 'stage_name');
        // }])
        //     ->where('status', 1)
        //     ->get();

        // $candidateDetail=DB::table()
    }
    public function show($id)
    {
        return Interview::with('candidate', 'interviewStage.assessment.assessmentResult.topic', 'interviewStage.assessment.assessmentResult.rate', 'interviewStage.remarks')
            ->where('candidate_id', $id)
            ->get();
    }
}
