<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::ordered()->withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')],
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
            'sort_order' => 'integer|default:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'slug', 'description', 'icon', 'sort_order', 'is_active']);

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('categories', 'public');
            $data['image_path'] = $path;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories', 'name')->ignore($category)],
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($category)],
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'slug', 'description', 'icon', 'sort_order', 'is_active']);

        if ($request->hasFile('image_path')) {
            if ($category->image_path) {
                Storage::delete('public/' . $category->image_path);
            }
            $path = $request->file('image_path')->store('categories', 'public');
            $data['image_path'] = $path;
        } elseif (!$request->filled('image_path')) {
            unset($data['image_path']);
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->exists()) {
            return back()->with('error', 'Tidak dapat menghapus kategori yang masih memiliki produk.');
        }

        if ($category->image_path) {
            Storage::delete('public/' . $category->image_path);
        }

        $category->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}