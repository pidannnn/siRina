<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;


use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Peminjaman;

class CekKetersediaanRuanganController extends Controller
{
    public function form()
    {
        try {
            $gedung = Ruangan::select('gedung')->distinct()->orderBy('gedung')->pluck('gedung');
            return view('cek_ketersediaan_ruangan', compact('gedung'));
        } catch (\Exception $e) {
            // Fallback jika query error
            $gedung = ['Gedung A', 'Gedung B'];
            return view('cek_ketersediaan_ruangan', compact('gedung'));
        }
    }

    public function cek(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $gedung = $request->input('gedung');

        // Ambil semua ruangan di gedung tersebut
        $ruanganList = Ruangan::where('gedung', $gedung)->get();

        $hasil = [];

        foreach ($ruanganList as $ruangan) {
            $peminjaman = \App\Models\Peminjaman::where('ruangan_id', $ruangan->id)
                ->whereBetween('tanggal_pinjam', [$tanggalAwal, $tanggalAkhir])
                ->get();

            $hasil[] = [
                'ruangan' => $ruangan, // ⬅️ ini penting!
                'tersedia' => $peminjaman->isEmpty(),
                'peminjaman' => $peminjaman,
            ];
        }

        return view('cek_ketersediaan_hasil', compact(
            'hasil',
            'tanggalAwal',
            'tanggalAkhir',
            'gedung'
        ));
        
    }
    
}
