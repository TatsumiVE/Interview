<?php

namespace App\Models;


use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['interview_date', 'interview_time','location', 'record_path', 'candidate_id'];
    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }

}
