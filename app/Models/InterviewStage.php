<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'interview_date',
        'interview_time',
        'stage_name',
        'location',
        'record_path'

    ];
}
