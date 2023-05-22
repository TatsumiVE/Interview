<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
