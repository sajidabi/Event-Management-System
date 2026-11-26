
@extends('vendor.layout')

@section('title', 'My Profile')

@section('page-heading', 'My Business Profile')

@section('content')

<style>
    .profile-box {
        background: white;
        padding: 30px;
        border-radius: 12px;
        max-width: 850px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .profile-box h3 {
        color: #17233d;
        margin-bottom: 8px;
    }

    .profile-box p {
        color: #777;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 7px;
        font-size: 14px;
    }

    .form-group textarea {
        height: 120px;
        resize: vertical;
    }

    .save-btn {
        background: #7655d9;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 7px;
        cursor: pointer;
    }

    .save-btn:hover {
        background: #6242c4;
    }

    .success {
        background: #dcfce7;
        color: #166534;
        padding: 12px;
        border-radius: 7px;
        margin-bottom: 20px;
    }

    .error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 5px;
    }
</style>

<div class="profile-box">

    <h3>Business Information</h3>
    <p>Add your business details so customers can know more about your services.</p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('vendor.profile.update') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>Business Name</label>
            <input type="text"
                   name="business_name"
                   value="{{ old('business_name', $profile?->business_name) }}"
                   placeholder="Enter your business name">

            @error('business_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="text"
                   name="phone"
                   value="{{ old('phone', $profile?->phone) }}"
                   placeholder="Enter your phone number">

            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Business Address</label>
            <input type="text"
                   name="address"
                   value="{{ old('address', $profile?->address) }}"
                   placeholder="Enter your business address">

            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Business Description</label>
            <textarea name="description"
                      placeholder="Describe your business">{{ old('description', $profile?->description) }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Business Profile Image</label>
              
@if($profile && $profile->profile_image)
    <div style="margin-bottom: 15px;">
        <img src="{{ asset('storage/' . $profile->profile_image) }}"
             alt="Business Profile Image"
             style="width: 130px; height: 130px; object-fit: cover; border-radius: 10px;">
    </div>
@endif

            <input type="file" name="profile_image" accept="image/*">

            @error('profile_image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="save-btn">
            Save Profile
        </button>

    </form>

</div>

@endsection
