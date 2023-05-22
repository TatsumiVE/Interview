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
        'stage_name',
        'interview_date',
        'interview_time',
        'location',
        'record_path'

    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public function interview()
    {
        return $this->hasMany(Interview::class);
    }

    public function assessment()
    {
        return $this->hasOne(Assessment::class);
    }
    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }
}
