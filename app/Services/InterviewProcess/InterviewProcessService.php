<?php

namespace App\Services\InterviewProcess;

use App\Models\Interview;

use App\Models\InterviewStage;

use App\Models\InterviewAssign;
use App\Services\InterviewProcess\InterviewProcessServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InterviewProcessService implements InterviewProcessServiceInterface
{
  public function store($request)
  {
    DB::transaction(function () use ($request) {

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


      foreach ($interviewers as $interviewer) {
        $interviewAssign = InterviewAssign::create([
          'interview_id' => $interview->id,
          'interviewer_id' => $interviewer['interviewer_id'],
        ]);
        $interviewAssigns[] = $interviewAssign;
      }


      return $interviewAssigns;
    });
  }

  public function update($request, $id)
  {
    $result = Interview::with('candidate', 'interviewStage')->where('id', $id)->first();
    return $result->update($request);
  }
}
