<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable=['rate','candidate_id','interviewer_id','topic_id',];
    public function topics(){
        return $this->belongsTo(Topic::class);
    }
}
