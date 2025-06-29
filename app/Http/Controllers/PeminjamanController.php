<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\Inventaris;
use App\Rules\NoDoubleBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\StatusPeminjamanUpdated;



class PeminjamanController extends Controller

{

    public function storeRuangan(Request $request)
{
    $validated = $request->validate([
        'ruangan_id' => 'required|exists:ruangan,id',
        'tanggal_pinjam' => 'required|date|after_or_equal:today',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        'keperluan' => 'required|string|max:255',
    ]);

    Peminjaman::create([
        'ruangan_id' => $validated['ruangan_id'],
        'user_id' => Auth::id(),
        'tanggal_pinjam' => $validated['tanggal_pinjam'],
        'jam_mulai' => $validated['jam_mulai'],
        'jam_selesai' => $validated['jam_selesai'],
        'keperluan' => $validated['keperluan'],
        'status' => 'pending',
    ]);

    return redirect()->route('user.dashboard')->with('success', 'Pengajuan peminjaman ruangan berhasil!');
}


    public function run(): void
    {
        $auditorium = Ruangan::where('nama', 'Aula Utama')->first();

        Peminjaman::create([
            'ruangan_id' => $auditorium->id,
            'user_id' => 1,
            'tanggal_pinjam' => now()->addDays(1)->format('Y-m-d'),
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '10:00:00',
            'keperluan' => 'Seminar Nasional',
            'status' => 'disetujui',
        ]);
    }

    public function approve($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->status = 'approved';
    $peminjaman->save();

    return redirect()->back()->with('success', 'Peminjaman ruangan telah disetujui.');
}

public function reject($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->status = 'rejected';
    $peminjaman->save();

    return redirect()->back()->with('success', 'Peminjaman ruangan telah ditolak.');
}


//     public function approve($id)
// {
//     $peminjaman = \App\Models\Peminjaman::findOrFail($id);
//     $peminjaman->status = 'approved';
//     $peminjaman->save();

//     return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman disetujui.');
// }

// public function reject($id)
// {
//     $peminjaman = \App\Models\Peminjaman::findOrFail($id);
//     $peminjaman->status = 'rejected';
//     $peminjaman->save();

//     return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman ditolak.');
// }


    // public function approve(Peminjaman $peminjaman)
    // {
    //     $peminjaman->update(['status' => 'disetujui']);
    //     $peminjaman->user->notify(new StatusPeminjamanUpdated($peminjaman));
    //     return back()->with('success', 'Peminjaman disetujui!');
    // }

    public function index()
    {
        $peminjamans = Peminjaman::with('ruangan', 'user')->latest()->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // public function create()
    // {
    //     $ruangan = Ruangan::all();
    //     $inventaris = Inventaris::all();
    //     return view('user.peminjaman.create', compact('ruangan', 'inventaris'));
    // }

//     public function formRuangan()
// {
//     $ruangan = [
//         (object)['id' => 1, 'nama' => 'Auditorium'],
//         (object)['id' => 2, 'nama' => 'Kelas A 201'],
//         (object)['id' => 3, 'nama' => 'Kelas B 201'],
//     ];

//     return view('user.peminjaman.form-ruangan', compact('ruangan'));
// }

// App\Http\Controllers\PeminjamanController
public function formRuangan()
{
    $ruangan = Ruangan::all(); // ✅ ambil dari DB
    return view('user.peminjaman.form-ruangan', compact('ruangan'));
}



public function formInventaris()
{
    $inventaris = [
        (object)['id' => 1, 'nama' => "Proyektor Epson"],
        (object)['id' => 2, 'nama' => "TV LED 55'"],
        (object)['id' => 3, 'nama' => "Sound + Mic Wireless"],
    ];

    return view('user.peminjaman.form-inventaris', compact('inventaris'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'ruangan_id' => 'required|exists:ruangan,id',
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keperluan' => 'required|string|max:255',
            'inventaris_id' => 'nullable|array',
            'inventaris_id.*' => 'exists:inventaris,id',
        ]);

        $peminjaman = Peminjaman::create([
            'ruangan_id' => $validated['ruangan_id'],
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
            'keperluan' => $validated['keperluan'],
            'status' => 'menunggu',
        ]);

        if ($request->has('inventaris_id')) {
            foreach ($validated['inventaris_id'] as $inventarisId) {
                $peminjaman->inventaris()->attach($inventarisId, ['jumlah' => 1]);
            }
        }

        return redirect()->route('user.dashboard')->with('success', 'Pengajuan peminjaman berhasil!');
    }

    // public function show($id)
    // {
    //     $peminjaman = Peminjaman::with(['ruangan', 'user'])->findOrFail($id);
    //     return view('peminjaman.show', compact('peminjaman'));
    // }

    public function show($id)
{
     $peminjaman = Peminjaman::with(['user', 'ruangan'])->findOrFail($id);
    return view('admin.peminjaman.show', compact('peminjaman'));
}


    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', [
            'peminjaman' => $peminjaman,
            'ruangan' => Ruangan::all(),
            'title' => 'Edit Peminjaman'
        ]);
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'ruangan_id' => 'required|exists:ruangan,id',
            'tanggal_pinjam' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keperluan' => 'required|string|max:255'
        ]);

        $peminjaman->update($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->surat_path) {
            Storage::delete($peminjaman->surat_path);
        }

        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
    //Cek ketersediaan ruangan
     public function cekKetersediaan(Request $request)
{
    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');
    $gedung = $request->input('gedung');

    // Ambil ID ruangan yang sedang dipinjam pada rentang tanggal tersebut
    $ruanganTerpakai = Peminjaman::whereBetween('tanggal_pinjam', [$tanggalAwal, $tanggalAkhir])
        ->pluck('ruangan_id')
        ->toArray();

    // Ambil ruangan yang tidak dipakai (available)
    $query = Ruangan::whereNotIn('id', $ruanganTerpakai);

    if ($gedung) {
        $query->where('gedung', $gedung);
    }

    $ruanganTersedia = $query->get();

    return view('user.hasil_ketersediaan', [
        'ruanganTersedia' => $ruanganTersedia,
        'tanggalAwal' => $tanggalAwal,
        'tanggalAkhir' => $tanggalAkhir
    ]);
}


    //hasil
    public function hasil(Request $request)
{
    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ]);

    $tanggal_awal = $request->tanggal_awal;
    $tanggal_akhir = $request->tanggal_akhir;
    $gedung = $request->gedung;

    $ruanganTerpakai = Peminjaman::whereBetween('tanggal_pinjam', [$tanggal_awal, $tanggal_akhir])
        ->pluck('ruangan_id');

    $ruanganKosong = Ruangan::whereNotIn('id', $ruanganTerpakai)
        ->when($gedung, fn($query) => $query->where('gedung', $gedung))
        ->get();

    return view('cek_ketersediaan_hasil', compact('ruanganKosong', 'tanggal_awal', 'tanggal_akhir'));
}



}
