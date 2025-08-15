<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'bio',
        'image',
        'email',
        'phone',
        'linkedin',
        'twitter',
        'facebook',
        'status',
        'level',
        'order'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByLevel($query, $level = null)
    {
        if ($level !== null) {
            return $query->where('level', $level);
        }
        return $query;
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('level', 'asc')->orderBy('order', 'asc');
    }
}
