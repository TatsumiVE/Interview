<?php

namespace App\Services\InterviewProcess;

use Carbon\Carbon;

use App\Models\Interview;
use App\Models\InterviewStage;

use App\Models\InterviewAssign;
use Illuminate\Support\Facades\DB;
use App\Services\InterviewProcess\InterviewProcessServiceInterface;



class InterviewProcessService implements InterviewProcessServiceInterface
{
    public function store($request)
    {



      return  DB::transaction(function () use ($request) {

        // $interviewDate = Carbon::createFromFormat('Y-m-d', $request['interview_date']);
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

        $interviewAssigns = [];

        foreach ($request['interviewer_id'] as $interviewer) {

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

    $result = Interview::where('candidate_id', $candidateId)
      ->where('id', $interviewId)->first();
    return $result->update($request);
  }
}
