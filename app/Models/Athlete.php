<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'school', 'is_scholarship', 'condition_id', 'photo_path'];
    
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    protected static function booted()
{
    static::creating(function ($athlete) {
        $athlete->age = now()->diffInYears($athlete->birth_date);
    });
    
    static::updating(function ($athlete) {
        $athlete->age = now()->diffInYears($athlete->birth_date);
    });
}
    
    // Calcular porcentaje de asistencia
    public function attendancePercentage($monthYear)
    {
        $totalDays = $this->attendances()->where('month_year', $monthYear)->count();
        $presentDays = $this->attendances()->where('month_year', $monthYear)
                            ->where('status', 'present')->count();
        
        return $totalDays > 0 ? round(($presentDays / $totalDays) * 100) : 0;
    }
}