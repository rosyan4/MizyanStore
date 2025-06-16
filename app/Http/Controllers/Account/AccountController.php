<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

/**
 * @method \Illuminate\Routing\Controller middleware(string|array $middleware, array $options = [])
 */
class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('account.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = $request->only(['name', 'email', 'phone_number', 'address']);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }
        
        $user->update($data);
        
        return redirect()->route('account.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $user = Auth::user();
        
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Password saat ini tidak cocok'])
                ->withInput();
        }
        
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('account.profile')
            ->with('success', 'Password berhasil diperbarui!');
    }

    public function orders()
    {
        $bookings = Auth::user()->bookings()
            ->with('service')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('account.orders', compact('bookings'));
    }

    public function orderDetail($id)
    {
        $booking = Auth::user()->bookings()
            ->with('service')
            ->findOrFail($id);
        
        return view('account.order-detail', compact('booking'));
    }

    public function history()
    {
        $user = Auth::user();
        
        $orders = $user->orders()
            ->with('items.product')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'orders_page');
            
        $bookings = $user->bookings()
            ->with('service')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'bookings_page');

        return view('account.history', compact('orders', 'bookings'));
    }
}