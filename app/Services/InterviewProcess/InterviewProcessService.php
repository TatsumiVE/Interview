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
    $validatedData = $request->validate([
      'stage_name' => 'required',
      'interview_date' => 'required',
      'interview_time' =>  'required',
      'location' => 'required|integer',
      'candidate_id' => 'required',
      'interviewer_id' => 'required|array|exists:interviewers,id',
    ]);
    return  DB::transaction(function () use ($validatedData) {

      $stage = InterviewStage::create([
        'stage_name' => $validatedData['stage_name'],
        'interview_date' => $validatedData['interview_date'],
        'interview_time' => $validatedData['interview_time'],
        'location' => $validatedData['location'],
      ]);

      $interview = Interview::create([
        'candidate_id' => $validatedData['candidate_id'],
        'interview_stage_id' => $stage->id,
      ]);

      $interviewAssigns = [];

      foreach ($validatedData['interviewer_id'] as $interviewer) {

        $interviewAssign = InterviewAssign::create([
          'interview_id' => $interview->id,
          'interviewer_id' => $interviewer,
        ]);
        $interviewAssigns[] = $interviewAssign;
      }
    });
  }


  public function interviewSummarize($request, $candidateId, $interviewId)
  {
    

    $result = Interview::
      where('candidate_id', $candidateId)
      ->where('id', $interviewId)->first();
    return $result->update($request);
  }
}
