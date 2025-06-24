<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'store_description',
        'business_type',
        'tax_id',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'website',
        'social_media',
        'business_plan',
        'documents',
        'status',
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
    ];

    protected $casts = [
        'social_media' => 'array',
        'documents' => 'array',
        'reviewed_at' => 'datetime',
    ];

    /**
     * Get the user that submitted the application
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin that reviewed the application
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
