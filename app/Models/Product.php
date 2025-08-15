<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'specifications',
        'features',
        'category_id',
        'image',
        'gallery',
        'video_url',
        'status',
        'featured',
        'order'
    ];

    protected $casts = [
        'specifications' => 'array',
        'features' => 'array',
        'gallery' => 'array',
        'featured' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get the primary image for the product.
     */
    public function primaryImage()
    {
        return $this->morphOne(Image::class, 'imageable')->where('is_primary', true);
    }

    /**
     * Scope for active products
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for featured products
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope for new products
     */
    public function scopeNew($query)
    {
        return $query->where('created_at', '>=', now()->subDays(30));
    }
}
