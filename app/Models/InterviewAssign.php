<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewAssign extends Model
{
    use HasFactory;
    protected $fillable=['interview_id','interviewer_id'];
}
