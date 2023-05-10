<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificLanguage extends Model
{
    use HasFactory;
    protected $fillable=['experience','language_id','candidate_id'];

    public function language(){
        return  $this->belongsTo(Language::class);
     }

     public function candidate(){
        return  $this->hasOne(Language::class);
     }
}