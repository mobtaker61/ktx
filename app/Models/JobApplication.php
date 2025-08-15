<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_opportunity_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone_code',
        'phone',
        'nationality',
        'current_location',
        'experience_years',
        'cover_letter',
        'resume_path',
        'is_reviewed',
        'is_shortlisted',
        'is_rejected',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_reviewed' => 'boolean',
        'is_shortlisted' => 'boolean',
        'is_rejected' => 'boolean'
    ];

    public function careerOpportunity()
    {
        return $this->belongsTo(CareerOpportunity::class, 'career_opportunity_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getGenderTextAttribute()
    {
        return ucfirst($this->gender);
    }

    public function getStatusTextAttribute()
    {
        if ($this->is_rejected) {
            return 'Rejected';
        } elseif ($this->is_shortlisted) {
            return 'Shortlisted';
        } elseif ($this->is_reviewed) {
            return 'Reviewed';
        } else {
            return 'Pending';
        }
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->is_rejected) {
            return 'danger';
        } elseif ($this->is_shortlisted) {
            return 'success';
        } elseif ($this->is_reviewed) {
            return 'info';
        } else {
            return 'warning';
        }
    }
}
