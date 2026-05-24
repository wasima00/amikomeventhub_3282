<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $partners = $query->latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:partners,name',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'logo_url' => $logoPath,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan!');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:partners,name,' . $partner->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($partner->logo_url && Storage::disk('public')->exists($partner->logo_url)) {
                Storage::disk('public')->delete($partner->logo_url);
            }

            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui!');
    }

    public function destroy(Partner $partner)
    {
        // Delete logo file if exists
        if ($partner->logo_url && Storage::disk('public')->exists($partner->logo_url)) {
            Storage::disk('public')->delete($partner->logo_url);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus!');
    }
}
