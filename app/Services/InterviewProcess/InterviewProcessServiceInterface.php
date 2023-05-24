<?php

namespace App\Services\InterviewProcess;


interface InterviewProcessServiceInterface
{
  public function store($data);
  public function update($data, $id);
}
