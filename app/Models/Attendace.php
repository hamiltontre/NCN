<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['athlete_id', 'group_id', 'date', 'status'];
    
    protected $casts = [
        'date' => 'date'
    ];
    
    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}