<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorPackageController extends Controller
{
    // Display all vendor packages
    public function index()
    {
        $packages = Auth::user()
            ->vendorPackages()
            ->with('service')
            ->latest()
            ->paginate(6);

        return view('vendor.packages.index', compact('packages'));
    }

    // Show create package form
    public function create()
    {
        $services = Auth::user()->vendorServices()
            ->where('status', 'active')
            ->get();

        return view('vendor.packages.create', compact('services'));
    }

    // Store new package
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:vendor_services,id',
            'package_name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Auth::user()->vendorServices()
            ->where('id', $request->service_id)
            ->where('status', 'active')
            ->firstOrFail();

        Auth::user()->vendorPackages()->create([
            'service_id' => $service->id,
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('vendor.packages.index')
            ->with('success', 'Package added successfully!');
    }

    // Show edit package form
    public function edit($id)
    {
        $package = Auth::user()
            ->vendorPackages()
            ->with('service')
            ->findOrFail($id);

        $services = Auth::user()->vendorServices()
            ->where('status', 'active')
            ->get();

        return view('vendor.packages.edit', compact('package', 'services'));
    }

    // Update package
    public function update(Request $request, $id)
    {
        $package = Auth::user()
            ->vendorPackages()
            ->findOrFail($id);

        $request->validate([
            'service_id' => 'required|exists:vendor_services,id',
            'package_name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Auth::user()->vendorServices()
            ->where('id', $request->service_id)
            ->where('status', 'active')
            ->firstOrFail();

        $package->update([
            'service_id' => $service->id,
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('vendor.packages.index')
            ->with('success', 'Package updated successfully!');
    }

    // Delete package
    public function destroy($id)
    {
        $package = Auth::user()
            ->vendorPackages()
            ->findOrFail($id);

        $package->delete();

        return redirect()
            ->route('vendor.packages.index')
            ->with('success', 'Package deleted successfully!');
    }
}
