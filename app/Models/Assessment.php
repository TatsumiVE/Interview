<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Candidate;
use App\Models\InterviewStage;
use App\Models\InterviewAssign;
use App\Models\AssessmentResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'interview_stage_id',
        'interview_assign_id'


    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function interviewAssign()
    {
        return $this->belongsTo(InterviewAssign::class);
    }
    public function interviewStage()
    {
        return $this->belongsTo(InterviewStage::class);
    }

    public function assessmentResult()
    {
        return $this->hasMany(AssessmentResult::class);
    }
}
