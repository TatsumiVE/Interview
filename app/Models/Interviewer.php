<?php

namespace App\Models;

use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interviewer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'department_id',
        'position_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at','deleted_at',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
