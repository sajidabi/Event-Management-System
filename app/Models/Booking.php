<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'vendor_id',
        'service_id',
        'package_id',
        'event_name',
        'event_type',
        'event_date',
        'event_time',
        'event_location',
        'guest_count',
        'message',
        'status',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(VendorService::class, 'service_id');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(VendorPackage::class, 'package_id');
    }
}