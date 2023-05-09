<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    use HasFactory;
    protected $fillable=['score','assessment_id','interview_id'];
    public function assement(){
        return $this->belongsTo(Assessment::class);
    }
    public function interview(){
        return $this->belongsTo(Interview::class);
    }
}
