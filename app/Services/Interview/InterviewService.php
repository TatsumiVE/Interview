<?php

namespace App\Services\Interview;

use App\Models\Remark;
use App\Models\Assessment;
use App\Models\AssessmentResult;
use App\Models\InterviewStage;
use Illuminate\Support\Facades\DB;

class InterviewService implements InterviewServiceInterface
{
    public function store($request)
    {

        $validatedData = $request->validate([
            'interview_stage_id' => 'required',
            'comment' => 'required',
            'grade' => 'required',
            'interview_assign_id' => 'required',
            'candidate_id' => 'required',
            'data' => 'required|array',
            'data.*.topic_id' => 'required',
            'data.*.rate_id' => 'required',

        ]);

        DB::transaction(function () use ($validatedData) {
            Remark::create([
                'interview_stage_id' => $validatedData['interview_stage_id'],
                'comment' => $validatedData['comment'],
                'grade' => $validatedData['grade'],
                'interview_assign_id' => $validatedData['interview_assign_id']
            ]);
            $assessment = Assessment::create([
                'candidate_id' => $validatedData['candidate_id'],
                'interview_stage_id' => $validatedData['interview_stage_id'],
                'interview_assign_id' => $validatedData['interview_assign_id']
            ]);


            foreach ($validatedData['data'] as $item) {
                AssessmentResult::create([
                    'topic_id' => $item['topic_id'],
                    'rate_id' => $item['rate_id'],
                    'assessment_id' => $assessment->id,
                ]);
            }
        });

    }
    public function update($data, $id)
    {
    }
}
