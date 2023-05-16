<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = ['rate_id', 'candidate_id', 'interviewer_id', 'topic_id', 'interview_stage_id'];

    public function topics()
    {
        return $this->belongsTo(Topic::class);
    }

    public function rates()
    {
        return $this->belongsTo(Rate::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
