
@extends('vendor.layout')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <div>
        <h2 style="margin: 0; color: #17233d;">My Packages</h2>
        <p style="color: #777;">Manage your event service packages here.</p>
    </div>

    <a href="{{ route('vendor.packages.create') }}"
       style="background: #7655d9; color: white; padding: 12px 20px; border-radius: 8px; text-decoration: none;">
        + Add New Package
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
                <th style="padding: 14px;">Package Name</th>
                <th style="padding: 14px;">Related Service</th>
                <th style="padding: 14px;">Price</th>
                <th style="padding: 14px;">Status</th>
                <th style="padding: 14px;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($packages as $package)
                <tr style="border-bottom: 1px solid #eee;">

                    <td style="padding: 14px;">
                        {{ $package->package_name }}
                    </td>

                    <td style="padding: 14px;">
                        {{ $package->service->service_name ?? 'Service unavailable' }}
                    </td>

                    <td style="padding: 14px;">
                        Rs. {{ number_format($package->price, 2) }}
                    </td>

                    <td style="padding: 14px;">
                        {{ ucfirst($package->status) }}
                    </td>

                    <td style="padding: 14px;">
                        <a href="{{ route('vendor.packages.edit', $package->id) }}"
                           style="color: #7655d9; text-decoration: none;">
                            Edit
                        </a>

                        <form action="{{ route('vendor.packages.destroy', $package->id) }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Are you sure you want to delete this package?')">

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
                    <td colspan="5" style="padding: 30px; text-align: center; color: #777;">
                        No packages added yet. Click "Add New Package" to get started.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $packages->links() }}
    </div>

</div>

@endsection
