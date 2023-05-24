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
        DB::transaction(function () use ($request) {
            Remark::create([
                'interview_stage_id' => $request->interview_stage_id,
                'comment' => $request->comment,
                'grade' => $request->grade,
                'interview_assign_id' => $request->interview_assign_id
            ]);
            $assessment = Assessment::create([
                'candidate_id' => $request->candidate_id,
                'interview_stage_id' => $request->interview_stage_id,
                'interview_assign_id' => $request->interview_assign_id
            ]);

            $data = $request->input('data', []);
            foreach ($data as $item) {
                AssessmentResult::create([
                    'topic_id' => $item['topic_id'],
                    'rate_id' => $item['rate_id'],
                    'assessment_id' => $assessment->id,
                ]);
            }

            InterviewStage::updated([
                ' record_path' => $request->record_path
            ]);
        });
    }
    public function update($data, $id)
    {

        // $result=Interviewer::where('id',$id)->first();
        // return $result->update($data);
    }
}
