<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',      
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function interviewers(){
        return $this->hasMany(Interviewer::class);
    }
    
}
