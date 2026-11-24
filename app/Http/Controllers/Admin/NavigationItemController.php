<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use Illuminate\Http\Request;

class NavigationItemController extends Controller
{
    public function index()
    {
        $items = NavigationItem::ordered()->get();
        return view('admin.navigation.index', compact('items'));
    }

    public function create()
    {
        return view('admin.navigation.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label'       => 'required|string|max:255',
            'url'         => 'required|string|max:500',
            'target'      => 'nullable|string|max:20',
            'is_active'   => 'boolean',
            'is_external' => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        NavigationItem::create($data);
        return redirect()->route('navigation.index')->with('success', 'Item navigasi berhasil ditambahkan.');
    }

    public function edit(NavigationItem $navigation)
    {
        return view('admin.navigation.edit', compact('navigation'));
    }

    public function update(Request $request, NavigationItem $navigation)
    {
        $data = $request->validate([
            'label'       => 'required|string|max:255',
            'url'         => 'required|string|max:500',
            'target'      => 'nullable|string|max:20',
            'is_active'   => 'boolean',
            'is_external' => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        $navigation->update($data);
        return redirect()->route('navigation.index')->with('success', 'Item navigasi berhasil diperbarui.');
    }

    public function destroy(NavigationItem $navigation)
    {
        $navigation->delete();
        return back()->with('success', 'Item navigasi berhasil dihapus.');
    }
}
