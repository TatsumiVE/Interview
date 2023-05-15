<?php

namespace App\Services\InterviewAssign;


interface InterviewAssignServiceInterface
{
  public function store($data);
  public function update($data, $id);
}
