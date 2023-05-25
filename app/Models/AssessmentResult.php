<?php

namespace App\Models;

use App\Models\Rate;
use App\Models\Topic;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssessmentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'rate_id',
        'assessment_id',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
