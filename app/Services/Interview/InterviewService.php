<?php

namespace App\Services\Interview;

use App\Models\Interview;

class InterviewService implements InterviewServiceInterface
{
    public function store($data){

         return Interview::create($data);
    }
    public function update($data,$id){

        // $result=Interviewer::where('id',$id)->first();
        // return $result->update($data);
    }

}

