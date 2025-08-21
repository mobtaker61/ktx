<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'status',
        'order',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeParentOnly($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeWithProductCount($query)
    {
        return $query->withCount('products');
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/'.$this->image);
        }

        // تصویر پیش‌فرض برای دسته‌های محصولات
        return asset('img/base/ktx_product.png');
    }

    public function getImageOrPlaceholderAttribute(): string
    {
        if ($this->image) {
            return asset('storage/'.$this->image);
        }

        // تولید placeholder SVG برای دسته‌های بدون تصویر
        return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 400 400'%3E%3Crect width='400' height='400' fill='%23f8f9fa'/%3E%3Cpath d='M150 120h100c11 0 20 9 20 20v80h30v20H100v-20h30v-80c0-11 9-20 20-20zm50 120a30 30 0 1 1 0-60 30 30 0 0 1 0 60z' fill='%230072b3'/%3E%3C/svg%3E";
    }

    public function getHasImageAttribute(): bool
    {
        return ! empty($this->image);
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name;
    }

    public function getShortDescriptionAttribute(): string
    {
        return $this->description ? Str::limit($this->description, 100) : 'No description available';
    }

    public function getProductCountAttribute(): int
    {
        return $this->products_count ?? 0;
    }

    public function getCategoryInfoAttribute(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->display_name,
            'description' => $this->short_description,
            'image_url' => $this->image_url,
            'has_image' => $this->has_image,
            'product_count' => $this->product_count,
            'slug' => $this->slug,
            'children' => $this->children->map(function ($child) {
                return [
                    'id' => $child->id,
                    'name' => $child->name,
                    'slug' => $child->slug,
                ];
            }),
        ];
    }
}
