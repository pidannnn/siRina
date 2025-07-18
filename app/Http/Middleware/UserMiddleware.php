<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'user') {  // Ganti 'role' → 'usertype'
            return $next($request);
        }

        abort(403, 'Akses ditolak. Hanya untuk user biasa.');
    }
}