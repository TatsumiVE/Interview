<?php

namespace App\Models;

use App\Models\AssessmentResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function assessmentResults()
    {
        return $this->hasMany(AssessmentResult::class);
    }
}
