<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function assessmentResults()
    {
        return $this->hasMany(AssessmentResult::class);
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
