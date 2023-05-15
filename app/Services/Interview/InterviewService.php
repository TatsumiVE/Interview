<?php

namespace App\Services\Interview;

use App\Models\Remark;
use App\Models\Assessment;
use Illuminate\Support\Facades\DB;

class InterviewService implements InterviewServiceInterface
{
    public function store($request){


      DB::transaction(function() use($request){

      Remark::create([
                    'interview_stage_id' => $request->interview_stage_id,
                    'comment'=>$request->comment,
                    'grade'=>$request->grade,
                    'interview_assign_id'=>$request->interview_assign_id]);
                    $data = $request->input('data');


            foreach($data as $data){

       Assessment::create([
                    'topic_id' => $data["'topic'"],
                    'rate_id'=>$data["'rate_id'"],
                    'candidate_id'=>$request->candidate_id,
                    'interviewer_id' => $request->interviewer_id,
                    'interview_stage_id' => $request->interview_stage_id,


                ]);
            }


     });

    }
    public function update($data,$id){

        // $result=Interviewer::where('id',$id)->first();
        // return $result->update($data);
    }

}

