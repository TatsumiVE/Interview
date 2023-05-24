<?php

namespace App\Services\Interviewer;
Interface InterviewerServiceInterface{
    public function store($data);
    public function update($data,$id);
    public function delete($id);
}
