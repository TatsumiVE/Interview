<?php

namespace App\Services\InterviewProcess;

use App\Models\Interview;

use App\Models\InterviewStage;
use App\Models\InterviewAssign;

use Illuminate\Support\Facades\DB;
use App\Services\InterviewProcess\InterviewProcessServiceInterface;

class InterviewProcessService implements InterviewProcessServiceInterface
{
  public function store($request)
  {
    return   DB::transaction(function () use ($request) {

      $stage = InterviewStage::create([
        'stage_name' => $request['stage_name'],
        'interview_date' => $request['interview_date'],
        'interview_time' => $request['interview_time'],
        'location' => $request['location'],
      ]);

      $interview = Interview::create([
        'candidate_id' => $request['candidate_id'],
        'interview_stage_id' => $stage->id,
      ]);
      $interviewers = $request->input('interviewer_id', []);
      $interviewAssigns = [];

      foreach ($interviewers as $interviewer) {

        $interviewAssign = InterviewAssign::create([
          'interview_id' => $interview->id,
          'interviewer_id' => $interviewer['interviewer_id'],
        ]);
        $interviewAssigns[] = $interviewAssign;
      }
    });
  }


  public function interviewSummarize($request, $candidateId, $stageId)
  {
    $result = Interview::with('candidate', 'interviewStage')->where('candidate_id', $candidateId)
      ->where('interview_stage_id', $stageId)->first();
    return $result->update($request);
  }
}
