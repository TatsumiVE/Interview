<?php

namespace App\Models;

use App\Models\Position;
use App\Models\Assessment;
use App\Models\InterviewAssign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interviewer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
