<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'certificate_number',
        'issue_date',
        'expiry_date',
        'issuing_authority',
        'status',
        'order'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
        'status' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function getStatusBadgeAttribute()
    {
        return $this->status
            ? '<span class="badge bg-success">Active</span>'
            : '<span class="badge bg-secondary">Inactive</span>';
    }

    public function getExpiryStatusAttribute()
    {
        if (!$this->expiry_date) {
            return 'No Expiry';
        }

        $daysUntilExpiry = now()->diffInDays($this->expiry_date, false);

        if ($daysUntilExpiry < 0) {
            return 'Expired';
        } elseif ($daysUntilExpiry <= 30) {
            return 'Expiring Soon';
        } else {
            return 'Valid';
        }
    }

    public function getExpiryBadgeAttribute()
    {
        $status = $this->expiry_status;

        switch ($status) {
            case 'Expired':
                return '<span class="badge bg-danger">Expired</span>';
            case 'Expiring Soon':
                return '<span class="badge bg-warning">Expiring Soon</span>';
            case 'Valid':
                return '<span class="badge bg-success">Valid</span>';
            default:
                return '<span class="badge bg-info">No Expiry</span>';
        }
    }
}
