
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorProfileController;
use App\Http\Controllers\VendorServiceController;
use App\Http\Controllers\VendorPackageController;
use App\Http\Controllers\VendorBookingController;
use App\Http\Controllers\AdminDashboardController;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Role-based dashboard redirect
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'vendor' => redirect()->route('vendor.dashboard'),
        'customer' => redirect()->route('customer.dashboard'),
        default => abort(403),
    };
})->middleware('auth')->name('dashboard');

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// Vendor Dashboard
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', function () {

    $profile = auth()->user()->vendorProfile;

    return view('vendor.dashboard', compact('profile'));

    })->name('dashboard');
    Route::get('/profile', [VendorProfileController::class, 'edit'])
    ->name('profile.edit');

    Route::post('/profile', [VendorProfileController::class, 'update'])
    ->name('profile.update');

// Vendor Services Routes
Route::get('/services', [VendorServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/create', [VendorServiceController::class, 'create'])
    ->name('services.create');

Route::post('/services', [VendorServiceController::class, 'store'])
    ->name('services.store');

Route::get('/services/{id}/edit', [VendorServiceController::class, 'edit'])
    ->name('services.edit');

Route::put('/services/{id}', [VendorServiceController::class, 'update'])
    ->name('services.update');

Route::delete('/services/{id}', [VendorServiceController::class, 'destroy'])
    ->name('services.destroy');
    // Vendor Packages Routes
Route::get('/packages', [VendorPackageController::class, 'index'])
    ->name('packages.index');

Route::get('/packages/create', [VendorPackageController::class, 'create'])
    ->name('packages.create');

Route::post('/packages', [VendorPackageController::class, 'store'])
    ->name('packages.store');

Route::get('/packages/{id}/edit', [VendorPackageController::class, 'edit'])
    ->name('packages.edit');

Route::put('/packages/{id}', [VendorPackageController::class, 'update'])
    ->name('packages.update');

Route::delete('/packages/{id}', [VendorPackageController::class, 'destroy'])
    ->name('packages.destroy');
    // Vendor Booking Requests
Route::get('/bookings', [VendorBookingController::class, 'index'])
    ->name('bookings.index');

Route::post('/bookings/{id}/accept', [VendorBookingController::class, 'accept'])
    ->name('bookings.accept');

Route::post('/bookings/{id}/reject', [VendorBookingController::class, 'reject'])
    ->name('bookings.reject');

});

// Customer Dashboard
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
