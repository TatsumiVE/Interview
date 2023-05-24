<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
    [
        'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function interviewers(){
        return $this->hasMany(Interviewer::class);
    }
}
