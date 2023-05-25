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
   protected $fillable = [
      'interview_id',
      'interviewer_id'
   ];
   protected $hidden = [
      'created_at', 'updated_at'
   ];


   public function interview()
   {
      return  $this->belongsTo(Interview::class);
   }

   public function interviewer()
   {
      return  $this->belongsTo(Interviewer::class);
   }

   public function remarks()
   {
      return  $this->hasMany(Remark::class);
   }

   public function assessment()
   {
      return $this->hasMany(Assessment::class);
   }
}
