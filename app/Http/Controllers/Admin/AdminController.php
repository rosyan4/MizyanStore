<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\GalleryItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        try {
            $totalProducts     = Product::count();
            $unreadMessages    = Contact::where('is_read', false)->count();
            $totalTestimonials = Testimonial::where('is_approved', false)->count();
            $totalBlogs        = BlogPost::count();
            $totalGalleries    = GalleryItem::count();
            $totalOrders       = Order::count();

            return view('admin.dashboard', compact(
                'totalProducts',
                'unreadMessages',
                'totalTestimonials',
                'totalBlogs',
                'totalGalleries',
                'totalOrders'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat dashboard: ' . $e->getMessage());
        }
    }

    public function profile()
    {
        try {
            $user = Auth::guard('admin')->user();
            return view('admin.profile', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat profil: ' . $e->getMessage());
        }
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        try {
            /** @var \App\Models\Admin $user */
            $user = Auth::guard('admin')->user();

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');

            if ($request->hasFile('profile_photo')) {
                if ($user->profile_photo) {
                    Storage::disk('public')->delete($user->profile_photo);
                }
                $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
            }

            $user->save(); // <-- WAJIB agar perubahan disimpan ke database

            return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            /** @var \App\Models\Admin $user */
            $user = Auth::guard('admin')->user();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('admin.profile')->with('success', 'Password berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui password: ' . $e->getMessage());
        }
    }
}
