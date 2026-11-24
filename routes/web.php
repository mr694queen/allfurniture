<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\CompanyFeatureController;
use App\Http\Controllers\Admin\OrderingStepController;
use App\Http\Controllers\Admin\NavigationItemController;
use App\Http\Controllers\Admin\SiteSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now use session route middleware
| to protect routes. These routes are perfect for the admin panel.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::get('/categories/{category:slug}/products', [HomeController::class, 'categoryProducts'])->name('category.products');

// Login routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    // Handle registration
})->name('register.post');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function () {
    // Handle password reset request
})->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function () {
    // Handle password reset
})->name('password.update');

// Admin routes - protected by auth middleware (admin check done in controller)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Site Settings
    Route::get('/settings', [SiteSettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SiteSettingController::class, 'update'])->name('admin.settings.update');

    // Navigation
    Route::resource('navigation', NavigationItemController::class);

    // Categories
    Route::resource('categories', CategoryController::class);

    // Products
    Route::resource('products', ProductController::class);

    // Company Features
    Route::resource('company-features', CompanyFeatureController::class);

    // Projects
    Route::resource('projects', ProjectController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // FAQ
    Route::resource('faqs', FaqController::class);

    // Contact Messages
    Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('admin.messages');
    Route::put('/contact-messages/{message}/read', [ContactMessageController::class, 'markAsRead'])->name('messages.mark-read');
    Route::delete('/contact-messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.delete');

    // Social Links
    Route::resource('social-links', SocialLinkController::class);

    // Ordering Steps
    Route::resource('ordering-steps', OrderingStepController::class);

    // Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/profile/password', [AdminController::class, 'updatePassword'])->name('admin.profile.password');

    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});