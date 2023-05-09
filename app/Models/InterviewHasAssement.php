<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewHasAssement extends Model
{
    use HasFactory;

    protected $fillable = [
        'assement_id',
        'interviewer_id'
    ];
}
