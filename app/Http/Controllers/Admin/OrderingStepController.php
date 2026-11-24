<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderingStep;
use Illuminate\Http\Request;

class OrderingStepController extends Controller
{
    public function index()
    {
        $steps = OrderingStep::ordered()->get();
        return view('admin.ordering-steps.index', compact('steps'));
    }

    public function create()
    {
        return view('admin.ordering-steps.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'step_number' => 'nullable|integer|min:1',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        OrderingStep::create($data);
        return redirect()->route('ordering-steps.index')->with('success', 'Langkah pemesanan berhasil ditambahkan.');
    }

    public function edit(OrderingStep $orderingStep)
    {
        return view('admin.ordering-steps.edit', compact('orderingStep'));
    }

    public function update(Request $request, OrderingStep $orderingStep)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'step_number' => 'nullable|integer|min:1',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        $orderingStep->update($data);
        return redirect()->route('ordering-steps.index')->with('success', 'Langkah pemesanan berhasil diperbarui.');
    }

    public function destroy(OrderingStep $orderingStep)
    {
        $orderingStep->delete();
        return back()->with('success', 'Langkah pemesanan berhasil dihapus.');
    }
}
