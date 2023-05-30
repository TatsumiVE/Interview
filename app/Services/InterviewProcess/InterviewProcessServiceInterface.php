<?php

namespace App\Services\InterviewProcess;


interface InterviewProcessServiceInterface
{
  public function store($request);

  public function interviewSummarize($request, $candidateID, $stageID);
}
