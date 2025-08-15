<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image',
        'status',
        'order'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
