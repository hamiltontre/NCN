<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = ['name', 'schedule'];
    
    protected $casts = [
        'schedule' => 'array'
    ];
    
    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }
    
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}