<?php

namespace App\Repositories\Interviewer;


use App\Models\Interviewer;



class InterviewerRepository implements InterviewerRepoInterface
{
    public function get()
    {


        return Interviewer::with('position.department')->orderBy('id', 'desc')->paginate(5);
    }

    public function show($id)
    {
        return Interviewer::where('id', $id)->first();
    }
}
