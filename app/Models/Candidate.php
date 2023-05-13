<?php

namespace App\Models;


use App\Models\Agency;
use App\Models\Position;
use App\Models\Assessment;
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
        'willingness_to_travel',
        'expected_salary',
        'last_salary',
        'earliest_starting_date',
        'positions_id',
        'agencies_id',


    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'positions_id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agencies_id');
    }

    public function assessment()
    {
        return $this->hasOne(Assessment::class);
    }
}
