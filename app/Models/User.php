<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

public function vendorProfile()
{
    
    return $this->hasOne(VendorProfile::class);
}


public function vendorServices()
{
    return $this->hasMany(VendorService::class, 'vendor_id');
}
public function vendorPackages()
{
    return $this->hasMany(VendorPackage::class, 'vendor_id');
}
// Customer ki bookings
public function customerBookings(): HasMany
{
    return $this->hasMany(Booking::class, 'customer_id');
}

// Vendor ki booking requests
public function vendorBookings(): HasMany
{
    return $this->hasMany(Booking::class, 'vendor_id');
}

}
