<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyFeature;
use Illuminate\Http\Request;

class CompanyFeatureController extends Controller
{
    public function index()
    {
        $features = CompanyFeature::ordered()->get();
        return view('admin.company-features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.company-features.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        CompanyFeature::create($data);
        return redirect()->route('company-features.index')->with('success', 'Fitur perusahaan berhasil ditambahkan.');
    }

    public function edit(CompanyFeature $companyFeature)
    {
        return view('admin.company-features.edit', compact('companyFeature'));
    }

    public function update(Request $request, CompanyFeature $companyFeature)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        $companyFeature->update($data);
        return redirect()->route('company-features.index')->with('success', 'Fitur perusahaan berhasil diperbarui.');
    }

    public function destroy(CompanyFeature $companyFeature)
    {
        $companyFeature->delete();
        return back()->with('success', 'Fitur perusahaan berhasil dihapus.');
    }
}
