<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function index()
    {
        // Pastikan hanya user biasa yang bisa mengakses
        if (Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        $user = Auth::user();

        // Ambil data peminjaman user
        $peminjamans = Peminjaman::with('ruangan')
                        ->where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        // Kirim ke view
        return view('user.dashboard', compact('peminjamans'));
    }
}
