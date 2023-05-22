<?php

namespace App\Services\InterviewAssign;

use App\Models\Interview;

use App\Models\InterviewStage;

use App\Models\InterviewAssign;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InterviewAssignService implements InterviewAssignServiceInterface
{
  public function store($request)
  {
    DB::transaction(function () use ($request) {


        $stage = InterviewStage::create([
          'stage_name' => $request['stage_name'],
          'interview_date' => $request['interview_date'],
          'interview_time' =>$request['interview_time'],
          'location' => $request['location'],
          'record_path' => $request['record_path']
        ]);

      $interview = Interview::create([
        'candidate_id' => $request['candidate_id'],
        'interview_stage_id' => $stage->id,
      ]);
      $interviewers = $request->input('interviewer_id', []);

      foreach ($interviewers as $interviewer) {
        $interviewerId = $interviewer['interviewer_id'];
        $interviewAssign = InterviewAssign::create([
          'interview_id' => $interview->id,
          'interviewer_id' => $interviewerId,
        ]);
      }
    });
  }

  public function update($request, $id)
  {
  }
}
