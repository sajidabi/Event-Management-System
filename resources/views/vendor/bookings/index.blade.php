@extends('vendor.layout')

@section('content')

<div class="page-header">
    <h2>Booking Requests</h2>
    <p>Manage your customer booking requests here.</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($bookings->count() > 0)

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Service</th>
                <th>Package</th>
                <th>Event</th>
                <th>Event Date</th>
                <th>Location</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->customer->name }}</td>
                    <td>{{ $booking->service->service_name }}</td>
                    <td>{{ $booking->package->package_name ?? 'No Package' }}</td>
                    <td>
                        {{ $booking->event_name }}
                        <br>
                        <small>{{ $booking->event_type }}</small>
                    </td>
                    <td>{{ $booking->event_date }}</td>
                    <td>{{ $booking->event_location }}</td>
                    <td>{{ $booking->guest_count ?? 'N/A' }}</td>
                    <td>
                        <span class="status {{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        @if($booking->status == 'pending')

                            <form action="{{ route('vendor.bookings.accept', $booking->id) }}"
                                  method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    Accept
                                </button>
                            </form>

                            <form action="{{ route('vendor.bookings.reject', $booking->id) }}"
                                  method="POST"
                                  style="margin-top:5px;">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Reject
                                </button>
                            </form>

                        @else
                            <span>No Action</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $bookings->links() }}
</div>

@else

<div class="empty-state">
    <h3>No Booking Requests Yet</h3>
    <p>When customers book your services, their requests will appear here.</p>
</div>

@endif

@endsection