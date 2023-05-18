<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'interviewer_id',
        'interview_stage_id'
    ];



    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function interviewer()
    {
        return $this->belongsTo(Interviewer::class);
    }

    public function interviewStage()
    {
        return $this->belongsTo(InterviewStage::class);
    }

    public function assessmentResult()
    {
        return $this->hasOne(AssessmentResult::class);
    }
}
