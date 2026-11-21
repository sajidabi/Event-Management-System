<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorProfileController extends Controller
{
    // Show vendor profile form
    public function edit()
    {
        $profile = Auth::user()->vendorProfile;

        return view('vendor.profile', compact('profile'));
    }

    // Save or update vendor profile
    public function update(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:150',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Auth::user()->vendorProfile;

        $data = $request->only([
            'business_name',
            'phone',
            'address',
            'description',
        ]);

        if ($request->hasFile('profile_image')) {

            if ($profile && $profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }

            $data['profile_image'] = $request->file('profile_image')
                ->store('vendor_profiles', 'public');
        }

        Auth::user()->vendorProfile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return redirect()
            ->route('vendor.profile.edit')
            ->with('success', 'Profile saved successfully!');
    }
}
