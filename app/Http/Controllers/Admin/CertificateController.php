<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('order')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate_number' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:issue_date',
            'issuing_authority' => 'nullable|string|max:255',
            'status' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['status'] = $request->has('status');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('certificates', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    public function show(Certificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate_number' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:issue_date',
            'issuing_authority' => 'nullable|string|max:255',
            'status' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['status'] = $request->has('status');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($certificate->image && Storage::disk('public')->exists($certificate->image)) {
                Storage::disk('public')->delete($certificate->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('certificates', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        // Delete image
        if ($certificate->image && Storage::disk('public')->exists($certificate->image)) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }

    public function toggleStatus(Certificate $certificate)
    {
        $certificate->update(['status' => !$certificate->status]);

        $status = $certificate->status ? 'activated' : 'deactivated';
        return redirect()->route('admin.certificates.index')
            ->with('success', "Certificate {$status} successfully.");
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'certificates' => 'required|array',
            'certificates.*.id' => 'required|exists:certificates,id',
            'certificates.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->certificates as $item) {
            Certificate::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
