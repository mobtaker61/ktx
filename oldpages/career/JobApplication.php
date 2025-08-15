<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_opportunity_id',
        'full_name',
        'gender',
        'email',
        'phone',
        'nationality',
        'current_location',
        'experience_years',
        'cover_letter',
        'resume_path',
        'ip_address',
        'user_agent',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function careerOpportunity()
    {
        return $this->belongsTo(CareerOpportunity::class, 'career_opportunity_id');
    }

    public function getGenderTextAttribute()
    {
        return $this->gender === 'male' ? 'Male' : 'Female';
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'در انتظار بررسی',
            'reviewed' => 'بررسی شده',
            'shortlisted' => 'انتخاب شده',
            'rejected' => 'رد شده',
            default => 'نامشخص'
        };
    }
}
