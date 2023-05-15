<?php

namespace App\Models;

use App\Models\Remark;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterviewStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'interview_date',
        'interview_time',
        'location',
        'record_path'

    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class,'interview_stages_id');
    }
    public function remark()
    {
        return $this->belongsTo(Remark::class,'interview_stages_id');
    }

}
