<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectTo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ?string $redirectTo = 'admin.dashboard'): Response
    {
        // 1. Cek jika admin sudah login
        if (Auth::guard('admin')->check()) {
            // 2. Redirect ke halaman yang ditentukan atau default dashboard
            return redirect()->route($redirectTo)
                ->with('info', 'Anda sudah login sebagai admin');
        }

        // 3. Tambahkan header untuk cache control
        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate');
        
        return $response;
    }
}