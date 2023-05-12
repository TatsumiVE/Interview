<?php

namespace App\Models;


use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone_number',
        'residentail_address',
        'date_of_birth',
        'cv_path',
        'expected_salary',
        'position_id',
        'agencies_id'

    ];

    public function positions()
    {
        return $this->belongsTo(Position::class);
    }

    public function assessment()
    {
        return $this->hasOne(Assessment::class);
    }
}
