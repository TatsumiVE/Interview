<?php

namespace App\Models;

use App\Models\InterviewAssign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Remark extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment', 'grade', 'interview_stage_id', 'interview_assign_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function interviewAssign()
    {
        return $this->belongsTo(InterviewAssign::class);
    }

    public function interviewStage()
    {
        return $this->belongsTo(InterviewStage::class);
    }
}
