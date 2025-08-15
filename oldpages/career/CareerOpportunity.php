<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerOpportunity extends Model
{
    use HasFactory;

    protected $table = 'career_opportunities';

    protected $fillable = [
        'title',
        'description',
        'location',
        'gender',
        'department',
        'experience_level',
        'employment_type',
        'salary_min',
        'salary_max',
        'expiry_date',
        'is_active',
        'requirements',
        'benefits'
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'is_active' => 'boolean',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2'
    ];

    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'career_opportunity_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('expiry_date', '>=', now());
    }

    public function getGenderTextAttribute()
    {
        return match($this->gender) {
            'male' => 'مرد',
            'female' => 'زن',
            'both' => 'هر دو',
            default => 'نامشخص'
        };
    }

    public function getEmploymentTypeTextAttribute()
    {
        return match($this->employment_type) {
            'full-time' => 'تمام وقت',
            'part-time' => 'نیمه وقت',
            'contract' => 'قراردادی',
            default => 'نامشخص'
        };
    }
}
