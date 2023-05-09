<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    public $fillable=['interview_date','interview_time','interview_type','record_path','interviewer_id','candidate_id'];

}
