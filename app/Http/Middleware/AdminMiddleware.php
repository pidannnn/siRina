<?php

namespace App\Http\Middleware;
use App\Models\User; // <-- INI TEMPATNYA

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak. Hanya untuk admin.');
        }

        return $next($request);
        
    }
}