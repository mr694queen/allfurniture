<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::ordered()->get();
        return view('admin.social-links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.social-links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'platform'   => 'required|string|max:100',
            'url'        => 'required|url|max:500',
            'icon'       => 'nullable|string|max:100',
            'is_active'  => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        SocialLink::create($data);
        return redirect()->route('social-links.index')->with('success', 'Social link berhasil ditambahkan.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social-links.edit', compact('socialLink'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $data = $request->validate([
            'platform'   => 'required|string|max:100',
            'url'        => 'required|url|max:500',
            'icon'       => 'nullable|string|max:100',
            'is_active'  => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $socialLink->update($data);
        return redirect()->route('social-links.index')->with('success', 'Social link berhasil diperbarui.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', 'Social link berhasil dihapus.');
    }
}
