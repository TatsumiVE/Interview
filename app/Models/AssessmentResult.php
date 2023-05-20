<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
