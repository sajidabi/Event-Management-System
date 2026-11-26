
@extends('vendor.layout')

@section('content')

<div style="margin-bottom: 25px;">
    <h2 style="color: #17233d;">Edit Package</h2>
    <p style="color: #777;">Update your package details below.</p>
</div>

<div style="background: white; padding: 25px; border-radius: 12px; max-width: 750px;">

    <form action="{{ route('vendor.packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 18px;">
            <label>Select Service</label>

            <select name="service_id"
                    style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">

                <option value="">Select Your Service</option>

                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                        {{ old('service_id', $package->service_id) == $service->id ? 'selected' : '' }}>
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

                @foreach(['Basic', 'Standard', 'Premium'] as $name)
                    <option value="{{ $name }}"
                        {{ old('package_name', $package->package_name) == $name ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach

            </select>

            @error('package_name')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Description</label>

            <textarea name="description" rows="4"
                      style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">{{ old('description', $package->description) }}</textarea>

            @error('description')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 22px;">
            <label>Package Price (Rs.)</label>

            <input type="number" name="price"
                   value="{{ old('price', $package->price) }}"
                   min="0" step="0.01"
                   style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">

            @error('price')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit"
                style="background: #7655d9; color: white; padding: 12px 25px; border: none; border-radius: 7px; cursor: pointer;">
            Update Package
        </button>

        <a href="{{ route('vendor.packages.index') }}"
           style="margin-left: 12px; color: #555; text-decoration: none;">
            Cancel
        </a>

    </form>

</div>

@endsection
