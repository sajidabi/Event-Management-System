<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorServiceController extends Controller
{
    // Show vendor's services
    public function index()
    {
        $services = Auth::user()
            ->vendorServices()
            ->latest()
            ->paginate(6);

        return view('vendor.services.index', compact('services'));
    }

    // Show add service form
    public function create()
    {
        return view('vendor.services.create');
    }

    // Save new service
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'service_name',
            'category',
            'description',
            'price',
        ]);

        if ($request->hasFile('service_image')) {
            $data['service_image'] = $request->file('service_image')
                ->store('vendor_services', 'public');
        }

        Auth::user()->vendorServices()->create($data);

        return redirect()
            ->route('vendor.services.index')
            ->with('success', 'Service added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $service = Auth::user()
            ->vendorServices()
            ->findOrFail($id);

        return view('vendor.services.edit', compact('service'));
    }

    // Update existing service
    public function update(Request $request, $id)
    {
        $service = Auth::user()
            ->vendorServices()
            ->findOrFail($id);

        $request->validate([
            'service_name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'service_name',
            'category',
            'description',
            'price',
        ]);

        if ($request->hasFile('service_image')) {

            if ($service->service_image) {
                Storage::disk('public')->delete($service->service_image);
            }

            $data['service_image'] = $request->file('service_image')
                ->store('vendor_services', 'public');
        }

        $service->update($data);

        return redirect()
            ->route('vendor.services.index')
            ->with('success', 'Service updated successfully!');
    }

    // Delete service
    public function destroy($id)
    {
        $service = Auth::user()
            ->vendorServices()
            ->findOrFail($id);

        if ($service->service_image) {
            Storage::disk('public')->delete($service->service_image);
        }

        $service->delete();

        return redirect()
            ->route('vendor.services.index')
            ->with('success', 'Service deleted successfully!');
    }
}
