
@extends('admin.layout')

@section('content')

<h2 style="color:#17233d; margin-bottom:10px;">
    Dashboard Overview
</h2>

<p style="color:#777; margin-bottom:25px;">
    Welcome to EventEase Admin Panel. Manage your platform from here.
</p>

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:20px;
">

    <div style="background:#f0ebff; padding:25px; border-radius:10px;">
        <h3 style="color:#7655d9;">{{ $totalUsers }}</h3>
        <p>Total Users</p>
    </div>

    <div style="background:#e8f5ff; padding:25px; border-radius:10px;">
        <h3 style="color:#1684c7;">{{ $totalVendors }}</h3>
        <p>Total Vendors</p>
    </div>

    <div style="background:#e8f8ee; padding:25px; border-radius:10px;">
        <h3 style="color:#269653;">{{ $totalServices }}</h3>
        <p>Total Services</p>
    </div>

    <div style="background:#fff0e8; padding:25px; border-radius:10px;">
        <h3 style="color:#e07835;">{{ $totalBookings }}</h3>
        <p>Total Bookings</p>
    </div>

</div>

<div style="margin-top:30px;">
    <h3 style="color:#17233d; margin-bottom:15px;">
        Admin Responsibilities
    </h3>

    <ul style="color:#666; line-height:2; padding-left:20px;">
        <li>Manage customer and vendor accounts.</li>
        <li>Manage service categories and services.</li>
        <li>Monitor customer bookings.</li>
        <li>Manage reviews and feedback.</li>
        <li>View platform reports.</li>
    </ul>
</div>

@endsection
