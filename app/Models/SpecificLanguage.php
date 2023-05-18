<?php

namespace App\Models;

use App\Models\Language;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecificLanguage extends Model
{
   use HasFactory;
   protected $fillable = [
      'experience',
      'devlanguage_id',
      'candidate_id'
   ];


   public function devlanguage()
   {
      return  $this->belongsTo(Devlanguage::class);
   }


   public function candidate()
   {
      return  $this->belongsTo(Candidate::class);
   }
}
