<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\{SiteSetting,Category,Product,CompanyFeature,OrderingStep,Project,Testimonial,Faq,SocialLink,NavigationItem};

view()->share('errors', new \Illuminate\Support\ViewErrorBag());

$settings       = SiteSetting::ordered()->get()->keyBy('key');
$navItems       = NavigationItem::active()->ordered()->get();
$categories     = Category::active()->ordered()->get();
$featuredProducts = Product::published()->featured()->with(['primaryImage','category'])->take(8)->get();
$features       = CompanyFeature::active()->ordered()->get();
$orderingSteps  = OrderingStep::active()->ordered()->get();
$projects       = Project::published()->with(['images'])->ordered()->take(6)->get();
$testimonials   = Testimonial::published()->ordered()->take(6)->get();
$faqs           = Faq::active()->ordered()->get();
$socialLinks    = SocialLink::active()->ordered()->get();

echo "Categories: " . $categories->count() . "\n";

$html = view('allfurniture.home', compact(
    'settings','navItems','categories','featuredProducts',
    'features','orderingSteps','projects','testimonials','faqs','socialLinks'
))->render();

echo "View rendered: " . strlen($html) . " chars\n";

$checks = [
    'cats-section'       => str_contains($html, 'cats-section'),
    'cats-deco-1'        => str_contains($html, 'cats-deco-1'),
    'cats-deco-2'        => str_contains($html, 'cats-deco-2'),
    'cats-wrap'          => str_contains($html, 'cats-wrap'),
    'cats-track'         => str_contains($html, 'catsTrack'),
    'cats-prev'          => str_contains($html, 'catsPrev'),
    'cats-next'          => str_contains($html, 'catsNext'),
    'cats-dots'          => str_contains($html, 'catsDots'),
    'cats-all-btn'       => str_contains($html, 'catsAllBtn'),
    'cat-card-featured'  => str_contains($html, 'cat-card--featured'),
    'cat-card-regular'   => str_contains($html, 'cat-card--regular'),
    'data-slug'          => str_contains($html, 'data-slug="'),
    'cat-card__icon'     => str_contains($html, 'cat-card__icon'),
    'cat-card__desc'     => str_contains($html, 'cat-card__desc'),
    'carousel JS'        => str_contains($html, 'CATEGORIES CAROUSEL'),
    'autoplay'           => str_contains($html, 'startAutoplay'),
    'touch swipe'        => str_contains($html, 'touchStartX'),
    'mouse drag'         => str_contains($html, 'isDragging'),
    'reduced motion'     => str_contains($html, 'prefers-reduced-motion'),
    'popup still works'  => str_contains($html, 'catModalOv'),
    'product popup'      => str_contains($html, 'pdOverlay'),
    'no old grid'        => !str_contains($html, 'cats__grid'),
    'closing html'       => str_contains($html, '</html>'),
];

$pass = 0; $fail = 0;
foreach ($checks as $label => $ok) {
    echo ($ok ? '✓' : '✗') . " {$label}\n";
    $ok ? $pass++ : $fail++;
}

// Count cat-card instances
preg_match_all('/class="cat-card /', $html, $m);
echo "\ncat-card count: " . count($m[0]) . "\n";

echo "\nResult: {$pass} passed, {$fail} failed\n";

if (str_contains($html, 'ErrorException') || str_contains($html, 'Undefined variable')) {
    echo "⚠ Blade error in output\n";
} else {
    echo "✓ No visible PHP errors\n";
}
