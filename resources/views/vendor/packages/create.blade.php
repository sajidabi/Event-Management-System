
@extends('vendor.layout')

@section('content')

<div style="margin-bottom: 25px;">
    <h2 style="color: #17233d;">Add New Package</h2>
    <p style="color: #777;">Create a package for your event service.</p>
</div>

<div style="background: white; padding: 25px; border-radius: 12px; max-width: 750px;">

    <form action="{{ route('vendor.packages.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 18px;">
            <label>Select Service</label>

            <select name="service_id"
                    style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">

                <option value="">Select Your Service</option>

                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                        {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->service_name }}
                    </option>
                @endforeach

            </select>

            @error('service_id')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Package Name</label>

            <select name="package_name"
                    style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">

                <option value="">Select Package</option>
                <option value="Basic" {{ old('package_name') == 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Standard" {{ old('package_name') == 'Standard' ? 'selected' : '' }}>Standard</option>
                <option value="Premium" {{ old('package_name') == 'Premium' ? 'selected' : '' }}>Premium</option>

            </select>

            @error('package_name')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Description</label>

            <textarea name="description" rows="4"
                      placeholder="Describe what is included in this package..."
                      style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">{{ old('description') }}</textarea>

            @error('description')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 22px;">
            <label>Package Price (Rs.)</label>

            <input type="number" name="price"
                   value="{{ old('price') }}"
                   min="0" step="0.01"
                   placeholder="Enter package price"
                   style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">

            @error('price')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit"
                style="background: #7655d9; color: white; padding: 12px 25px; border: none; border-radius: 7px; cursor: pointer;">
            Save Package
        </button>

        <a href="{{ route('vendor.packages.index') }}"
           style="margin-left: 12px; color: #555; text-decoration: none;">
            Cancel
        </a>

    </form>

</div>

@endsection
