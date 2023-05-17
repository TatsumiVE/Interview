<?php

namespace App\Models;

use App\Models\Language;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecificLanguage extends Model
{
   use HasFactory;
<<<<<<< HEAD
   protected $fillable = ['experience','language_id', 'candidate_id'];
=======
   protected $fillable = [
      'experience',
      'devlanguage_id',
      'candidate_id'
   ];
>>>>>>> dce0ccff28b8d6dda1a1e74fed6ebc4b4e570103

   public function Devlanguage()
   {
      return  $this->belongsTo(Devlanguage::class);
   }


   public function candidate()
   {
      return  $this->belongsTo(Candidate::class);
   }
}
