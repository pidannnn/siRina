<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{   

    public function showA201()
{
    $ruangan = \App\Models\Ruangan::where('nama', 'Kelas A 201')->first();

    $jadwals = \App\Models\Peminjaman::whereHas('ruangan', function ($query) {
            $query->where('nama', 'Kelas A 201');
        })
        ->where('status', 'approved')
        ->orderBy('tanggal_pinjam', 'asc')
        ->get();

    return view('a201', compact('jadwals', 'ruangan'));
}


    /**
     * Tampilkan daftar semua ruangan.
     */
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('admin.ruangan.index', compact('ruangans'));
    }

    /**
     * Tampilkan form tambah ruangan.
     */
    public function create()
    {
        return view('admin.ruangan.create');
    }

    /**
     * Simpan ruangan baru ke database.
     */
    public function store(Request $request)
    {

         $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'gedung' => 'required|string|max:255',
        'lantai' => 'required|integer',
        'kapasitas' => 'required|integer',
        'tipe' => 'required|string|max:255',
        'fasilitas' => 'nullable|string',
    ]);

    $validated['fasilitas'] = json_encode(array_map('trim', explode(',', $validated['fasilitas'])));

    \App\Models\Ruangan::create($validated);

    return redirect()->route('admin.ruangan.index')->with('success', 'Ruangan berhasil ditambahkan.');

        // $request->validate([
        //     'nama_ruangan' => 'required|string|max:100',
        //     'lokasi' => 'nullable|string|max:255',
        //     'kapasitas' => 'nullable|integer',
        // ]);

        // Ruangan::create($request->all());

        // return redirect()->route('admin.ruangan.index')
        //                  ->with('success', 'Ruangan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu ruangan (jika diperlukan).
     */
    public function show(Ruangan $ruangan)
    {
        return view('admin.ruangan.show', compact('ruangan'));
    }

    /**
     * Tampilkan form edit ruangan.
     */
    public function edit(Ruangan $ruangan)
    {
        return view('admin.ruangan.edit', compact('ruangan'));
    }

    /**
     * Simpan perubahan data ruangan.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:100',
            'lokasi' => 'nullable|string|max:255',
            'kapasitas' => 'nullable|integer',
        ]);

        $ruangan->update($request->all());

        return redirect()->route('admin.ruangan.index')
                         ->with('success', 'Data ruangan berhasil diperbarui.');
    }

    /**
     * Hapus data ruangan.
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();

        return redirect()->route('admin.ruangan.index')
                         ->with('success', 'Data ruangan berhasil dihapus.');
    }
}
