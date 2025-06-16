<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Proses login (menggunakan LoginRequest)
    
public function login(AdminLoginRequest $request)
{
    $request->authenticate();
    $request->session()->regenerate();

    return redirect()->intended(route('admin.dashboard'));
}

    // Tampilkan dashboard
    public function dashboard()
    {
        return view('admin.dashboard', [
            'admin' => Auth::guard('admin')->user()
        ]);
    }

    // Tampilkan settings (hanya superadmin)
    public function showSettings()
    {
        $this->authorize('superadmin', Admin::class);
        return view('admin.settings');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
