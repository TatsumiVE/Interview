<?php

namespace App\Services\Interviewer;

interface InterviewerServiceInterface
{
    public function store($data);
    public function update($data, $id);
}
