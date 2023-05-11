<?php

namespace App\Repositories\Interviewer;

use App\Models\Interviewer;

class InterviewerRepository implements InterviewerRepoInterface
{
  public function get()
  {
    return Interviewer::with('position')->all();
  }
  // public function show($id)
  // {
  //   return Interviewer::with('position')->where('id', $id)->first();
  // }
}
