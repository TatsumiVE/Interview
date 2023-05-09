<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'degree',
        'gender',
        'phone_number',
        'residentail_address',
        'date_of_birth',
        'cv_path',
        'position_id',
        'language_id'

    ];
}
