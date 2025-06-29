<?php

namespace App\Http\Controllers\User;
use App\Models\Inventaris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanInventaris;

class PeminjamanInventarisController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'inventaris_id' => 'required|exists:inventaris,id',
        'jumlah_pinjam' => 'required|integer|min:1',
        'tanggal_pinjam' => 'required|date',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'keperluan' => 'required|string',
    ]);
    

    $peminjaman = PeminjamanInventaris::create([
        'user_id' => Auth::id(),
        'inventaris_id' => $request->inventaris_id,
        'jumlah_pinjam' => $request->jumlah_pinjam,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => null,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'status' => 'pending',
        'keperluan' => $request->keperluan,
    ]);

    return redirect()->route('user.dashboard')->with('success', 'Peminjaman inventaris berhasil diajukan!');
}
    public function create()
{
    $inventaris = Inventaris::all(); // ambil semua inventaris dari database
    return view('user.peminjaman.form-inventaris', compact('inventaris'));
}
}
