
@extends('vendor.layout')

@section('content')

<div style="margin-bottom: 25px;">
    <h2 style="color: #17233d;">Edit Service</h2>
    <p style="color: #777;">Update your event service details.</p>
</div>

<div style="background: white; padding: 25px; border-radius: 12px; max-width: 750px;">

    <form action="{{ route('vendor.services.update', $service->id) }}"
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div style="margin-bottom: 18px;">
            <label>Service Name</label>
            <input type="text" name="service_name"
                   value="{{ old('service_name', $service->service_name) }}"
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

                @foreach(['Decoration', 'Photography', 'Catering', 'Makeup Artist', 'Event Planning', 'Venue'] as $category)
                    <option value="{{ $category }}"
                        {{ old('category', $service->category) == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach

            </select>

            @error('category')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Description</label>
            <textarea name="description" rows="4"
                      style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">{{ old('description', $service->description) }}</textarea>

            @error('description')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label>Price (Rs.)</label>
            <input type="number" name="price"
                   value="{{ old('price', $service->price) }}"
                   min="0" step="0.01"
                   style="width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ddd; border-radius: 7px;">

            @error('price')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label>Current Service Image</label>

            @if($service->service_image)
                <div style="margin-top: 10px;">
                    <img src="{{ asset('storage/' . $service->service_image) }}"
                         alt="Service Image"
                         style="width: 130px; height: 130px; object-fit: cover; border-radius: 10px;">
                </div>
            @else
                <p>No image uploaded.</p>
            @endif

            <label style="display: block; margin-top: 15px;">Choose New Image (Optional)</label>
            <input type="file" name="service_image" accept=".jpg,.jpeg,.png"
                   style="margin-top: 10px;">

            @error('service_image')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit"
                style="background: #7655d9; color: white; padding: 12px 25px; border: none; border-radius: 7px; cursor: pointer;">
            Update Service
        </button>

        <a href="{{ route('vendor.services.index') }}"
           style="margin-left: 12px; color: #555; text-decoration: none;">
            Cancel
        </a>

    </form>

</div>

@endsection
