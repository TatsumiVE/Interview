<?php

namespace App\Models;

use App\Models\Language;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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






    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }
}
