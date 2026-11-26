
@extends('vendor.layout')

@section('content')

<div style="margin-bottom: 25px;">
    <h2 style="color: #17233d;">Add New Service</h2>
    <p style="color: #777;">Enter your event service details below.</p>
</div>

<div style="background: white; padding: 25px; border-radius: 12px; max-width: 750px;">

    <form action="{{ route('vendor.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 18px;">
            <label>Service Name</label>
            <input type="text" name="service_name" value="{{ old('service_name') }}"
                   placeholder="e.g. Wedding Decoration"
                   style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">
            @error('service_name')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Category</label>
            <select name="category"
                    style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">
                <option value="">Select Category</option>
                <option value="Decoration">Decoration</option>
                <option value="Photography">Photography</option>
                <option value="Catering">Catering</option>
                <option value="Makeup Artist">Makeup Artist</option>
                <option value="Event Planning">Event Planning</option>
                <option value="Venue">Venue</option>
            </select>
            @error('category')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Description</label>
            <textarea name="description" rows="4"
                      placeholder="Describe your service..."
                      style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">{{ old('description') }}</textarea>
            @error('description')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Price (Rs.)</label>
            <input type="number" name="price" value="{{ old('price') }}"
                   min="0" step="0.01" placeholder="Enter service price"
                   style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">
            @error('price')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 22px;">
            <label>Service Image</label>
            <input type="file" name="service_image" accept=".jpg,.jpeg,.png"
                   style="display: block; margin-top: 10px;">
            @error('service_image')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit"
                style="background: #7655d9; color: white; padding: 12px 25px; border: none; border-radius: 7px; cursor: pointer;">
            Save Service
        </button>

        <a href="{{ route('vendor.services.index') }}"
           style="margin-left: 12px; color: #555; text-decoration: none;">
            Cancel
        </a>

    </form>

</div>

@endsection
