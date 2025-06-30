<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    // Tampilkan semua data inventaris
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('admin.inventaris.index', compact('inventaris'));
    }

    // Form tambah inventaris
    public function create()
    {
        $last = Inventaris::orderBy('id', 'desc')->first();
        $nextNumber = $last ? $last->id + 1 : 1;
        $kode = 'INV-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return view('admin.inventaris.create', compact('kode'));
    }


    // Simpan inventaris baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:inventaris,kode',
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string|max:255',
        ]);

        Inventaris::create([
            'kode' => $request->kode, // ✅ ini penting
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan!');
    }


    // Form edit
    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('admin.inventaris.edit', compact('inventaris'));
    }

    // Simpan update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string|max:50',
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil diupdate!');
    }

    // Hapus data
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil dihapus!');
    }
}
