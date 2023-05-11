<?php
namespace App\Repositories\Candidate;

use App\Models\Candidate;

class CandidateRepository implements CandidateRepoInterface{
    public function get(){
        return Candidate::all();

    }
    public function show($id){
        return Candidate::where('id',$id)->first();

    }
}
