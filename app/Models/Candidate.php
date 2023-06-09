<?php

namespace App\Models;


use App\Models\Agency;
use App\Models\Position;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone_number',
        'residential_address',
        'date_of_birth',
        'cv_path',
        'willingness_to_travel',
        'expected_salary',
        'last_salary',
        'earliest_starting_date',
        'position_id',
        'agency_id',
        'status'


    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function specificLanguages()
    {
        return $this->hasMany(SpecificLanguage::class);
    }


    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }



    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
