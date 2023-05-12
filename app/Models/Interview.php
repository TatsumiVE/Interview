<?php

namespace App\Models;


use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['interview_result','interview_summarize', 'interview_result_date', 'candidate_id',  'interview_stages_id'];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    public function intervieStages()
    {
        return $this->hasMany(InterviewStage::class);
    }
}
