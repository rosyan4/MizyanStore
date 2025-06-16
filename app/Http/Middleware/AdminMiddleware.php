<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        // 1. Cek apakah user terautentikasi sebagai admin
        if (!Auth::guard('admin')->check()) {
            return redirect()
                ->route('admin.auth.login')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // 2. Jika parameter role diberikan, verifikasi role admin
        if ($role && !$request->user('admin')->hasRole($role)) {
            abort(403, 'Unauthorized access');
        }

        // 3. Tambahkan header untuk admin area
        $response = $next($request);
        $response->headers->set('X-Admin-Area', 'true');
        
        return $response;
    }
}