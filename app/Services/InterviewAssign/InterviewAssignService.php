<?php

namespace App\Services\InterviewAssign;

use App\Models\Interview;

use App\Models\InterviewStage;
use App\Models\InterviewAssign;
use Illuminate\Support\Facades\DB;

class InterviewAssignService implements InterviewAssignServiceInterface
{
  public function store($request)
  {
    DB::transaction(function () use ($request) {

      $stage = InterviewStage::create([
        'stage_name' => $request['stage_name'],
        'interview_date' => $request['interview_date'],
        'interview_time' => $request['interview_time'],
        'location' => $request['location'],
        'record_path' => $request['record_path']
      ]);

      $interview = Interview::create([
        'interview_result' => $request['interview_result'],
        'interview_summarize' => $request['interview_summarize'],
        'interview_result_date' => $request['interview_result_date'],
        'candidate_id' => $request['candidate_id'],
        'interview_stages_id' => $stage->id,
      ]);
      $interviewers = $request->input('interviewer_id', []);
      foreach ($interviewers as $interviewer) {
        $interviewAssign = InterviewAssign::create([
          'interview_id' => $interview->id,
          'interviewer_id' => $interviewer,
        ]);
      }
    });
  }

  public function update($request, $id)
  {
  }
}
