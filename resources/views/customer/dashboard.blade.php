
@extends('customer.layout')

@section('content')

<h2 style="color:#17233d; margin-bottom:10px;">
    My Dashboard
</h2>

<p style="color:#777; margin-bottom:25px;">
    Manage your event planning activities from here.
</p>

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:20px;
">

    <div style="background:#f0ebff; padding:25px; border-radius:10px;">
        <h3 style="color:#7655d9;">0</h3>
        <p>Total Bookings</p>
    </div>

    <div style="background:#e8f5ff; padding:25px; border-radius:10px;">
        <h3 style="color:#1684c7;">0</h3>
        <p>Pending Bookings</p>
    </div>

    <div style="background:#e8f8ee; padding:25px; border-radius:10px;">
        <h3 style="color:#269653;">0</h3>
        <p>Accepted Bookings</p>
    </div>

    <div style="background:#fff0e8; padding:25px; border-radius:10px;">
        <h3 style="color:#e07835;">0</h3>
        <p>Completed Events</p>
    </div>

</div>

<div style="margin-top:30px;">
    <h3 style="color:#17233d; margin-bottom:15px;">
        Start Planning Your Event
    </h3>

    <p style="color:#777; margin-bottom:20px;">
        Find professional vendors and book services for your special occasion.
    </p>

    <a href="#"
       style="
        display:inline-block;
        background:#7655d9;
        color:white;
        padding:12px 22px;
        border-radius:7px;
        text-decoration:none;
       ">
        Browse Services
    </a>
</div>

@endsection
