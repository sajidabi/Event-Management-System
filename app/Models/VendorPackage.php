<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorPackage extends Model
{
    protected $fillable = [
        'vendor_id',
        'service_id',
        'package_name',
        'description',
        'price',
        'status',
    ];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(VendorService::class, 'service_id');
    }
    public function packages()
{
    return $this->hasMany(VendorPackage::class, 'service_id');
}
}
