<?php

namespace App\Services\Interview;

interface InterviewServiceInterface
{
    public function store($data);
    public function update($data, $id);
}
