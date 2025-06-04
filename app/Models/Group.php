<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'type', 'condition_id'];
    
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}