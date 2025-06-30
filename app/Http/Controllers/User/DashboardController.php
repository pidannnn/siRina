<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\Models\PeminjamanInventaris; // tambahkan di atas jika belum


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function index()
    {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        $user = Auth::user();

        // Riwayat peminjaman ruangan
        $peminjamans = Peminjaman::with('ruangan')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Riwayat peminjaman inventaris
        $riwayatInventaris = PeminjamanInventaris::with('inventaris')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.dashboard', compact('peminjamans', 'riwayatInventaris'));
    }
}
