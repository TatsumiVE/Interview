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
      'stage_name' => 'required|string',
      'interview_date' => 'required|date',
      'interview_time' => 'required',
      'location' => 'required',
      'candidate_id' => 'required|numeric',
      'interviewer_id' => 'required|array',
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


  public function interviewSummarize($request, $candidateId, $stageId)
  {
    $result = Interview::with('candidate', 'interviewStage')
      ->where('candidate_id', $candidateId)
      ->where('interview_stage_id', $stageId)->first();
    return $result->update($request);
  }
}
