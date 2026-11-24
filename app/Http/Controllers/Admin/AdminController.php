<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products'    => Product::count(),
            'total_categories'  => Category::count(),
            'total_projects'    => Project::count(),
            'total_testimonials'=> Testimonial::count(),
            'total_messages'    => ContactMessage::count(),
            'unread_messages'   => ContactMessage::where('is_read', false)->count(),
        ];

        $recent_activity = ContactMessage::latest('created_at')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_activity'));
    }

    public function profile()
    {
        return view('admin.profile', ['user' => auth()->user()]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|confirmed|min:8',
        ]);

        if (!password_verify($request->current_password, auth()->user()->password)) {
            return back()->with('error', 'Kata sandi saat ini salah.');
        }

        auth()->user()->update(['password' => bcrypt($request->password)]);

        return back()->with('success', 'Password berhasil diubah.');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
