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
      // Parse datetime string
      // $datetime = Carbon::parse($request->input('datetime'));

      // Get date and time components
      // $interviewDate = $datetime->format('Y-m-d');
      // $interviewTime = $datetime->format('H:i:s');


      $stage = InterviewStage::create([
        'stage_name' => $request['stage_name'],
        'interview_date' => $request['interview_date'],
        'interview_time' => $request['interview_time'],
        'location' => $request['location'],
        // 'record_path' => $request['record_path']
      ]);

      $interview = Interview::create([
        // 'interview_result' => $request['interview_result'],
        // 'interview_summarize' => $request['interview_summarize'],
        // 'interview_result_date' => $request['interview_result_date'],
        'candidate_id' => $request['candidate_id'],
        'interview_stage_id' => $stage->id,
      ]);
      $interviewers = $request->input('interviewer_id', []);

      foreach ($interviewers as $interviewer) {
        $interviewerId = $interviewer['interviewer_id'];
        $interviewAssign = InterviewAssign::create([
          'interview_id' => $interview->id,
          'interviewer_id' =>  $interviewerId,
        ]);
        // $interviewAssigns[] = $interviewAssign;
      }

      dd($interviewAssign);
    });
  }

  public function update($request, $id)
  {
    $result = Interview::with('candidate', 'interviewStage')->where('id', $id)->first();
    return $result->update($request);
  }
}
