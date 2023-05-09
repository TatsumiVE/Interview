<?php

namespace App\Models;

use App\Models\Assement;
use App\Models\Interview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssementResult extends Model
{
    use HasFactory;
    protected $fillable=['score','assement_id','interview_id'];
    public function assement(){
        return $this->belongsTo(Assement::class);
    }
    public function interview(){
        return $this->belongsTo(Interview::class);
    }
}
