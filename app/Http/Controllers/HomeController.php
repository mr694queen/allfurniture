<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Category;
use App\Models\Product;
use App\Models\CompanyFeature;
use App\Models\OrderingStep;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\SocialLink;
use App\Models\NavigationItem;
use App\Models\ContactMessage;

class HomeController extends Controller
{
    public function index()
    {
        // Site settings — ambil semua sekaligus, akses via helper SiteSetting::get()
        $settings = SiteSetting::ordered()->get()->keyBy('key');

        // Navigation
        $navItems = NavigationItem::active()->ordered()->get();

        // Categories
        $categories = Category::active()->ordered()->get();

        // Products
        $featuredProducts = Product::published()
            ->featured()
            ->with(['primaryImage', 'category'])
            ->take(8)
            ->get();

        // Company features (keunggulan) — ambil semua yang aktif untuk slider
        $features = CompanyFeature::active()->ordered()->get();

        // Ordering steps — cara pemesanan
        $orderingSteps = OrderingStep::active()->ordered()->get();

        // Projects / Portfolio
        $projects = Project::published()
            ->with(['images' => fn($q) => $q->ordered()->take(1)])
            ->ordered()
            ->take(6)
            ->get();

        // Testimonials
        $testimonials = Testimonial::published()->ordered()->take(6)->get();

        // FAQ
        $faqs = Faq::active()->ordered()->get();

        // Social links
        $socialLinks = SocialLink::active()->ordered()->get();

        return view('allfurniture.home', compact(
            'settings',
            'navItems',
            'categories',
            'featuredProducts',
            'features',
            'orderingSteps',
            'projects',
            'testimonials',
            'faqs',
            'socialLinks'
        ));
    }

    /**
     * JSON endpoint: load produk per kategori untuk popup interaktif
     */
    public function categoryProducts(Category $category)
    {
        // Hanya kategori aktif yang bisa diakses
        if (!$category->is_active) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $products = Product::published()
            ->where('category_id', $category->id)
            ->with(['primaryImage', 'images' => fn($q) => $q->ordered()->limit(5), 'materials'])
            ->ordered()
            ->get()
            ->map(function ($p) {
                $imgPath = $p->primaryImage?->image_path;
                return [
                    'id'          => $p->id,
                    'name'        => $p->name,
                    'slug'        => $p->slug,
                    'description' => $p->description,
                    'material'    => $p->material,
                    'dimensions'  => $p->dimensions,
                    'price'       => $p->price ? (float) $p->price : null,
                    'price_fmt'   => $p->formatted_price,
                    'price_label' => $p->price_label,
                    'badge'       => $p->badge,
                    'is_available'=> $p->is_available,
                    'is_featured' => $p->is_featured,
                    'shopee_url'        => $p->shopee_url,
                    'shopee_store_name' => $p->shopee_store_name,
                    'shopee_notes'      => $p->shopee_notes,
                    'image'       => $imgPath ? asset('storage/' . $imgPath) : null,
                    'images'      => $p->images->map(fn($i) => [
                        'url'   => asset('storage/' . $i->image_path),
                        'alt'   => $i->alt_text ?? $p->name,
                    ])->values(),
                    'materials'   => $p->materials->map(fn($m) => [
                        'name'        => $m->name,
                        'description' => $m->description,
                        'spec_notes'  => $m->spec_notes,
                    ])->values(),
                ];
            });

        return response()->json([
            'category' => [
                'id'          => $category->id,
                'name'        => $category->name,
                'slug'        => $category->slug,
                'description' => $category->description,
                'icon'        => $category->icon,
                'image'       => $category->image_path ? asset('storage/' . $category->image_path) : null,
                'product_count' => $products->count(),
            ],
            'products' => $products,
        ]);
    }
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'whatsapp'    => 'required|string|max:20',
            'email'       => 'nullable|email|max:255',
            'requirement' => 'required|string|max:2000',
        ]);

        ContactMessage::create([
            'name'        => $validated['name'],
            'whatsapp'    => $validated['whatsapp'],
            'email'       => $validated['email'] ?? null,
            'requirement' => $validated['requirement'],
            'status'      => 'new',
            'is_read'     => false,
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return back()->with('contact_success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
