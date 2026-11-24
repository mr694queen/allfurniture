<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'message'      => 'required|string',
            'project_type' => 'nullable|string|max:255',
            'rating'       => 'nullable|integer|min:1|max:5',
            'is_published' => 'boolean',
            'sort_order'   => 'nullable|integer',
            'photo_path'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $data['photo_path'] = $request->file('photo_path')->store('testimonials', 'public');
        }

        Testimonial::create($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'message'      => 'required|string',
            'project_type' => 'nullable|string|max:255',
            'rating'       => 'nullable|integer|min:1|max:5',
            'is_published' => 'boolean',
            'sort_order'   => 'nullable|integer',
            'photo_path'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            if ($testimonial->photo_path) Storage::delete('public/' . $testimonial->photo_path);
            $data['photo_path'] = $request->file('photo_path')->store('testimonials', 'public');
        } else {
            unset($data['photo_path']);
        }

        $testimonial->update($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo_path) Storage::delete('public/' . $testimonial->photo_path);
        $testimonial->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
