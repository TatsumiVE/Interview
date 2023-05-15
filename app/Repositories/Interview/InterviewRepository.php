<?php
namespace App\Repositories\Interview;

use App\Models\Interview;

class InterviewRepository implements InterviewRepoInterface{
    public function get(){
        return Interview::with('position.department');
    }
    public function show($id)
    {

    }
}
