<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interviewer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position_id',
    ];
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
