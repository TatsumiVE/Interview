<?php

namespace App\Models;

use App\Models\Interview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterviewResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'result',
        'interview_id'

    ];

    public function interview(){
        return $this->hasOne(Interview::class);
    }
}
