<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\VendorService;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers    = User::count();
        $totalVendors  = User::where('role', 'vendor')->count();
        $totalServices = VendorService::count();
        $totalBookings = Booking::count();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalVendors', 'totalServices', 'totalBookings'
        ));
    }
}