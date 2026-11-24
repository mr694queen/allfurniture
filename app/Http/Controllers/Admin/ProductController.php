<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'primaryImage'])->ordered();

        if ($request->filled('search')) {
            $query->search($request->search);
        }
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('status')) {
            if ($request->status === 'published')  $query->where('is_published', true);
            if ($request->status === 'draft')       $query->where('is_published', false);
            if ($request->status === 'featured')    $query->where('is_featured', true);
        }

        $products   = $query->paginate(15)->withQueryString();
        $categories = Category::active()->ordered()->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'slug'               => 'nullable|string|max:255|unique:products,slug',
            'category_id'        => 'nullable|exists:categories,id',
            'description'        => 'nullable|string',
            'material'           => 'nullable|string|max:255',
            'dimensions'         => 'nullable|string|max:255',
            'price'              => 'nullable|numeric|min:0',
            'price_label'        => 'nullable|string|max:100',
            'badge'              => 'nullable|string|max:50',
            'shopee_url'         => 'nullable|url|max:500',
            'shopee_store_name'  => 'nullable|string|max:255',
            'shopee_notes'       => 'nullable|string|max:500',
            'is_available'       => 'boolean',
            'is_published'       => 'boolean',
            'is_featured'        => 'boolean',
            'sort_order'         => 'nullable|integer',
            'meta_title'         => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:500',
            'images.*'           => 'nullable|image|max:4096',
            'materials'          => 'nullable|array',
            'materials.*.name'   => 'required|string|max:255',
            'materials.*.description' => 'nullable|string|max:500',
            'materials.*.spec_notes'  => 'nullable|string|max:500',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $materialsData = $data['materials'] ?? [];
        unset($data['materials']);

        $product = Product::create($data);

        // Save materials
        foreach ($materialsData as $i => $mat) {
            if (!empty($mat['name'])) {
                ProductMaterial::create([
                    'product_id'  => $product->id,
                    'name'        => $mat['name'],
                    'description' => $mat['description'] ?? null,
                    'spec_notes'  => $mat['spec_notes'] ?? null,
                    'sort_order' => $i,
                ]);
            }
        }

        // Upload images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'sort_order' => $i,
                    'is_primary' => $i === 0,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', "Produk \"{$product->name}\" berhasil ditambahkan.");
    }

    public function show(Product $product)
    {
        $product->load(['category', 'images', 'variants', 'materials']);
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load(['images', 'variants', 'materials']);
        $categories = Category::active()->ordered()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'slug'               => ['nullable','string','max:255', Rule::unique('products','slug')->ignore($product->id)],
            'category_id'        => 'nullable|exists:categories,id',
            'description'        => 'nullable|string',
            'material'           => 'nullable|string|max:255',
            'dimensions'         => 'nullable|string|max:255',
            'price'              => 'nullable|numeric|min:0',
            'price_label'        => 'nullable|string|max:100',
            'badge'              => 'nullable|string|max:50',
            'shopee_url'         => 'nullable|url|max:500',
            'shopee_store_name'  => 'nullable|string|max:255',
            'shopee_notes'       => 'nullable|string|max:500',
            'is_available'       => 'boolean',
            'is_published'       => 'boolean',
            'is_featured'        => 'boolean',
            'sort_order'         => 'nullable|integer',
            'meta_title'         => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:500',
            'images.*'            => 'nullable|image|max:4096',
            'delete_images.*'    => 'nullable|integer|exists:product_images,id',
            'materials'          => 'nullable|array',
            'materials.*.id'     => 'nullable|integer|exists:product_materials,id',
            'materials.*.name'   => 'required|string|max:255',
            'materials.*.description' => 'nullable|string|max:500',
            'materials.*.spec_notes'  => 'nullable|string|max:500',
            'delete_materials.*' => 'nullable|integer|exists:product_materials,id',
        ]);

        $materialsData    = $data['materials'] ?? [];
        $deleteMaterials  = $data['delete_materials'] ?? [];
        unset($data['materials'], $data['delete_materials']);

        $product->update($data);

        // Delete selected materials
        foreach ($deleteMaterials as $matId) {
            ProductMaterial::where('id', $matId)->where('product_id', $product->id)->delete();
        }

        // Sync materials: update existing, create new
        $existingIds = [];
        foreach ($materialsData as $i => $mat) {
            if (empty($mat['name'])) continue;

            if (!empty($mat['id'])) {
                // Update existing
                ProductMaterial::where('id', $mat['id'])
                    ->where('product_id', $product->id)
                    ->update([
                        'name'        => $mat['name'],
                        'description' => $mat['description'] ?? null,
                        'spec_notes'  => $mat['spec_notes'] ?? null,
                        'sort_order'  => $i,
                    ]);
                $existingIds[] = $mat['id'];
            } else {
                // Create new
                $newMat = ProductMaterial::create([
                    'product_id'  => $product->id,
                    'name'        => $mat['name'],
                    'description' => $mat['description'] ?? null,
                    'spec_notes'  => $mat['spec_notes'] ?? null,
                    'sort_order'  => $i,
                ]);
                $existingIds[] = $newMat->id;
            }
        }

        // Delete selected images
        if (!empty($data['delete_images'])) {
            foreach ($data['delete_images'] as $imgId) {
                $img = ProductImage::find($imgId);
                if ($img && $img->product_id === $product->id) {
                    Storage::delete('public/'.$img->image_path);
                    $img->delete();
                }
            }
        }

        // Upload new images
        if ($request->hasFile('images')) {
            $offset = $product->images()->max('sort_order') ?? -1;
            $isPrimary = $product->images()->where('is_primary', true)->doesntExist();
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'sort_order' => $offset + $i + 1,
                    'is_primary' => $isPrimary && $i === 0,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', "Produk \"{$product->name}\" berhasil diperbarui.");
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $img) {
            Storage::delete('public/'.$img->image_path);
        }
        $product->images()->delete();
        $product->materials()->delete();
        $product->delete();
        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
