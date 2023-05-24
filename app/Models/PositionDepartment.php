<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionDepartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'position_id',
        'department_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
