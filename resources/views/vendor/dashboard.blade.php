
@extends('vendor.layout')

@section('title', 'Vendor Dashboard')

@section('page-heading', 'Dashboard Overview')

@section('content')

<style>
    .welcome {
        margin-bottom: 25px;
    }

    .welcome h2 {
        color: #17233d;
        margin-bottom: 8px;
    }

    .welcome p {
        color: #777;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        padding: 25px 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .card h3 {
        color: #777;
        font-size: 15px;
        margin-bottom: 15px;
    }

    .card h1 {
        color: #7655d9;
        font-size: 30px;
    }

    .section {
        background: white;
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .section h3 {
        margin-bottom: 20px;
        color: #17233d;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    th {
        color: #555;
        background: #f8f7fc;
    }

    .empty {
        text-align: center;
        color: #888;
        padding: 25px;
    }

    @media(max-width: 1000px) {
        .cards {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width: 600px) {
        .cards {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="welcome">

    <div style="display: flex; align-items: center; gap: 20px;">

        @if($profile && $profile->profile_image)
            <img src="{{ asset('storage/' . $profile->profile_image) }}"
                 alt="Business Image"
                 style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%;">
        @else
            <div style="width: 90px; height: 90px; background: #e9e3fa; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <span style="font-size: 30px; color: #7655d9;">V</span>
            </div>
        @endif

        <div>
            <h2>Welcome, {{ $profile?->business_name ?? 'Vendor' }}!</h2>

            <p>
                Manage your event services and booking requests from here.
            </p>

            @if($profile)
                <p>
                    {{ $profile->address }}
                </p>
            @endif
        </div>

    </div>

</div>


<div class="cards">

    <div class="card">
        <h3>Total Services</h3>
        <h1>0</h1>
    </div>

    <div class="card">
        <h3>Total Bookings</h3>
        <h1>0</h1>
    </div>

    <div class="card">
        <h3>Pending Requests</h3>
        <h1>0</h1>
    </div>

    <div class="card">
        <h3>Completed Events</h3>
        <h1>0</h1>
    </div>

</div>

<div class="section">

    <h3>Recent Booking Requests</h3>

    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Event Type</th>
                <th>Event Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="4" class="empty">
                    No booking requests yet.
                </td>
            </tr>
        </tbody>
    </table>

</div>

<div class="section">

    <h3>My Services</h3>

    <p class="empty">
        You have not added any services yet.
    </p>

</div>

@endsection
