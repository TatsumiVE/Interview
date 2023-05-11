<?php

namespace App\Services\Interviewer;


use App\Models\Interviewer;
use App\Services\Interviewer\InterviewerServiceInterface;

class InterviewerService implements InterviewerServiceInterface
{
  public function store($data)
  {
    return Interviewer::create($data);
  }

  public function update($data, $id)
  {
    $result = Interviewer::where('id', $id)->first();
    return $result->update($data);
  }
}
