<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['interview_date', 'interview_time', 'interview_stage','location', 'record_path', 'candidate_id'];
}
