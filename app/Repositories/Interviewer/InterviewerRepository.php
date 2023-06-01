<?php

namespace App\Repositories\Interviewer;


use App\Models\Interviewer;


class InterviewerRepository implements InterviewerRepoInterface
{
    public function get()
    {
        return Interviewer::with('department', 'position')->orderBy('id','desc')->get();
    }
    public function show($id)
    {
        return Interviewer::with('department', 'position')->where('id', $id)->first();
    }
}
