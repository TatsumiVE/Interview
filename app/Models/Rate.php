<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function assessment()
    {
        return $this->hasMany(Assessment::class);
    }
}
