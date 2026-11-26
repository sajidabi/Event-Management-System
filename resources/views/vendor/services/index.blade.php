
@extends('vendor.layout')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <div>
        <h2 style="margin: 0; color: #17233d;">My Services</h2>
        <p style="color: #777;">Manage your event services here.</p>
    </div>

    <a href="{{ route('vendor.services.create') }}"
       style="background: #7655d9; color: white; padding: 12px 20px; border-radius: 8px; text-decoration: none;">
        + Add New Service
    </a>
</div>

@if(session('success'))
    <div style="background: #d1fae5; color: #065f46; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<div style="background: white; padding: 20px; border-radius: 12px; overflow-x: auto;">

    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background: #f5f3ff;">
                <th style="padding: 14px;">Image</th>
                <th style="padding: 14px;">Service Name</th>
                <th style="padding: 14px;">Category</th>
                <th style="padding: 14px;">Price</th>
                <th style="padding: 14px;">Status</th>
                <th style="padding: 14px;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($services as $service)
                <tr style="border-bottom: 1px solid #eee;">

                    <td style="padding: 14px;">
                        @if($service->service_image)
                            <img src="{{ asset('storage/' . $service->service_image) }}"
                                 width="60" height="60"
                                 style="object-fit: cover; border-radius: 8px;">
                        @else
                            No Image
                        @endif
                    </td>

                    <td style="padding: 14px;">
                        {{ $service->service_name }}
                    </td>

                    <td style="padding: 14px;">
                        {{ $service->category }}
                    </td>

                    <td style="padding: 14px;">
                        Rs. {{ number_format($service->price, 2) }}
                    </td>

                    <td style="padding: 14px;">
                        {{ ucfirst($service->status) }}
                    </td>

                    <td style="padding: 14px;">
                        <a href="{{ route('vendor.services.edit', $service->id) }}"
                           style="color: #7655d9; text-decoration: none;">
                            Edit
                        </a>

                        <form action="{{ route('vendor.services.destroy', $service->id) }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Are you sure you want to delete this service?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    style="background: none; border: none; color: red; cursor: pointer; margin-left: 10px;">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 30px; text-align: center; color: #777;">
                        No services added yet. Click "Add New Service" to get started.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $services->links() }}
    </div>

</div>

@endsection
