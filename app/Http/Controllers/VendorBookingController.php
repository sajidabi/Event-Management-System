<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class VendorBookingController extends Controller
{
    // Show vendor booking requests
    public function index()
    {
        $bookings = Auth::user()
            ->vendorBookings()
            ->with(['customer', 'service', 'package'])
            ->latest()
            ->paginate(10);

        return view('vendor.bookings.index', compact('bookings'));
    }

    // Accept booking request
    public function accept($id)
    {
        $booking = Auth::user()
            ->vendorBookings()
            ->where('status', 'pending')
            ->findOrFail($id);

        $booking->update([
            'status' => 'accepted',
        ]);

        return redirect()
            ->route('vendor.bookings.index')
            ->with('success', 'Booking accepted successfully!');
    }

    // Reject booking request
    public function reject($id)
    {
        $booking = Auth::user()
            ->vendorBookings()
            ->where('status', 'pending')
            ->findOrFail($id);

        $booking->update([
            'status' => 'rejected',
        ]);

        return redirect()
            ->route('vendor.bookings.index')
            ->with('success', 'Booking rejected successfully!');
    }
}