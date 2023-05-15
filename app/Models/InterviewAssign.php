<?php

namespace App\Models;

use App\Models\Remark;
use App\Models\Interview;
use App\Models\Interviewer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterviewAssign extends Model
{
   use HasFactory;
   protected $fillable = ['interview_id', 'interviewer_id'];



   // public function remarks()
   // {
   //    return  $this->belongsTo(Remark::class);
   // }

   public function interview()
   {
      return  $this->belongsTo(Interview::class);
   }

   public function interviewer()
   {
      return  $this->belongsTo(Interviewer::class);
   }
}
