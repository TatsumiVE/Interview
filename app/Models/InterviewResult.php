<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'interviewer_id',
        'candidate_id',
        'interview_id'

    ];
}
