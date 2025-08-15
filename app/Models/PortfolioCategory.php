<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'order',
        'status'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    /**
     * Get portfolios in this category
     */
    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'category_id');
    }

    /**
     * Scope for active categories
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for ordered categories
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }

    /**
     * Get icon class with fallback
     */
    public function getIconClassAttribute()
    {
        return $this->icon ?: 'cog';
    }

    /**
     * Get color with fallback
     */
    public function getColorAttribute($value)
    {
        return $value ?: '#0d6efd';
    }
}
