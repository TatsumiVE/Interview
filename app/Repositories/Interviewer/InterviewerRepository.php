<?php
namespace App\Repositories\Interviewer;

use Exception;
use App\Models\Interviewer;

class InterviewerRepository implements InterviewerRepoInterface{
    public function get(){
    try{
        return Interviewer::with('position.department')->orderBy('position_id', 'desc')->paginate(10);
    }catch(Exception $exception){
        throw new Exception($exception->getMessage());
    }
    }


    public function show($id){
        // return Interviewer::where('id',$id)->first();

    }
}
