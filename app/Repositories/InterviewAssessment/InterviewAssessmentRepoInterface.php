<?php

namespace App\Repositories\InterviewAssessment;

interface InterviewAssessmentRepoInterface
{
  public function show($candidateId, $InterviewerId);
}
