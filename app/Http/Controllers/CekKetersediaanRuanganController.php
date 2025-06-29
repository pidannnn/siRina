<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Peminjaman;

class CekKetersediaanRuanganController extends Controller
{
    public function form()
    {
        $gedung = Ruangan::select('gedung')->distinct()->pluck('gedung');
        return view('cek_ketersediaan_ruangan', compact('gedung'));
    }

    public function cek(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'gedung' => 'required|string',
        ]);

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        // Ambil semua ruangan di gedung yang dipilih
        $ruangan = Ruangan::where('gedung', $request->gedung)->get();

        // Proses: tentukan status dan peminjaman per ruangan
        $hasil = $ruangan->map(function ($r) use ($tanggalAwal, $tanggalAkhir) {
            // Ambil peminjaman dalam rentang tanggal
            $peminjaman = Peminjaman::where('ruangan_id', $r->id)
                ->whereBetween('tanggal_pinjam', [$tanggalAwal, $tanggalAkhir])
                ->get(['tanggal_pinjam']);

            return [
                'ruangan' => $r,
                'peminjaman' => $peminjaman,
                'tersedia' => $peminjaman->isEmpty(),
            ];
        });

        return view('cek_ketersediaan_hasil', [
            'tanggal_awal' => $tanggalAwal,
            'tanggal_akhir' => $tanggalAkhir,
            'gedung' => $request->gedung,
            'hasil' => $hasil
        ]);
    }
}
