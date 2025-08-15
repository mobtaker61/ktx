<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'client',
        'location',
        'completion_date',
        'category_id',
        'image',
        'gallery',
        'status',
        'order',
        'featured'
    ];

    protected $casts = [
        'gallery' => 'array',
        'completion_date' => 'date',
        'featured' => 'boolean'
    ];

    protected $appends = [
        'status_badge',
        'completion_date_formatted'
    ];

    /**
     * Get the category that owns the portfolio
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }

    /**
     * Scope for active portfolios
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for featured portfolios
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope for portfolios by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope for recent portfolios
     */
    public function scopeRecent($query, $limit = 6)
    {
        return $query->latest()->limit($limit);
    }

    /**
     * Get status badge HTML
     */
    public function getStatusBadgeAttribute()
    {
        $statusMap = [
            'active' => 'success',
            'inactive' => 'secondary',
            'pending' => 'warning',
            'completed' => 'success',
            'in_progress' => 'info'
        ];

        $badgeClass = $statusMap[$this->status] ?? 'secondary';

        return '<span class="badge bg-' . $badgeClass . '">' . ucfirst($this->status) . '</span>';
    }

    /**
     * Get formatted completion date
     */
    public function getCompletionDateFormattedAttribute()
    {
        if (!$this->completion_date) {
            return 'N/A';
        }

        return $this->completion_date->format('F Y');
    }

    /**
     * Get portfolio image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return asset('img/service-1.jpg'); // Default image
    }

    /**
     * Get category name (for backward compatibility)
     */
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->name : 'Uncategorized';
    }

    /**
     * Check if portfolio is completed
     */
    public function isCompleted()
    {
        return $this->status === 'completed' || $this->status === 'active';
    }

    /**
     * Check if portfolio is featured
     */
    public function isFeatured()
    {
        return $this->featured === true;
    }
}
