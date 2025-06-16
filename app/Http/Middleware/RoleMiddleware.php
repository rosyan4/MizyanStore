<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @param  string|null  $guard
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role, ?string $guard = null): Response
    {
        // 1. Tentukan guard yang digunakan (default: admin)
        $guard = $guard ?? 'admin';

        // 2. Cek autentikasi
        if (!Auth::guard($guard)->check()) {
            return $guard === 'admin'
                ? redirect()->route('admin.auth.login')
                : abort(401, 'Unauthenticated');
        }

        // 3. Dapatkan user yang terautentikasi
        $user = Auth::guard($guard)->user();

        // 4. Validasi dan verifikasi role
        if (!$user || !$this->checkRole($user, $role)) {
            abort(403, 'Anda tidak memiliki izin akses ke halaman ini');
        }

        return $next($request);
    }

    /**
     * Cek role user (support untuk single role)
     *
     * @param  mixed  $user
     * @param  string  $role
     * @return bool
     */
    protected function checkRole($user, string $role): bool
    {
        // Jika menggunakan package Spatie (uncomment jika diperlukan)
        // return $user->hasRole($role);

        // Implementasi manual (ubah sesuai struktur database Anda)
        return $user->role === $role;
    }
}
