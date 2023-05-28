<?php

namespace App\Models;


use App\Models\Candidate;
use App\Models\InterviewStage;
use App\Models\InterviewAssign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [

        'interview_summarize',
        'interview_result_date',
        'interview_result',
        'record_path',
        'candidate_id',
        'interview_stage_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    public function interviewStage()
    {
        return $this->belongsTo(InterviewStage::class);
    }

    public function interviewAssign()
    {
        return $this->hasMany(InterviewAssign::class);
    }
}
