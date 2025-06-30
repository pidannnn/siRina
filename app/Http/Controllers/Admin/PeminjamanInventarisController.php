<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanInventaris;

class PeminjamanInventarisController extends Controller
{
    public function index()
    {
        $peminjamans = PeminjamanInventaris::with(['user', 'inventaris'])->latest()->get();
        return view('admin.peminjaman_inventaris.index', compact('peminjamans'));
    }

    public function show($id)
    {
        $peminjaman = PeminjamanInventaris::with('user', 'inventaris')->findOrFail($id);
        return view('admin.peminjaman_inventaris.show', compact('peminjaman'));
    }

    public function approve($id)
    {
        $peminjaman = PeminjamanInventaris::findOrFail($id);
        $peminjaman->status = PeminjamanInventaris::STATUS_DISETUJUI; // ✅ Cocok dengan enum
        $peminjaman->save();

        return back()->with('success', 'Peminjaman inventaris disetujui.');
    }

    public function reject($id)
    {
        $peminjaman = PeminjamanInventaris::findOrFail($id);
        $peminjaman->status = PeminjamanInventaris::STATUS_DITOLAK; // ✅ Cocok dengan enum
        $peminjaman->save();

        return back()->with('success', 'Peminjaman inventaris ditolak.');
    }
}
