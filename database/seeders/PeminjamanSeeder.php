<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\Ruangan;

class PeminjamanSeeder extends Seeder
{
     public function run(): void
    {
        $auditorium = Ruangan::firstOrCreate(
            ['nama' => 'Aula Utama'],
            [
                'gedung' => 'Gedung A',
                'lantai' => 'Lantai 1',
                'kapasitas' => 100,
                'tipe' => 'Rapat',
                'fasilitas' => json_encode(['proyektor', 'AC', 'podium']),
            ]
        );

            \App\Models\Peminjaman::create([
        'ruangan_id' => $auditorium->id,
        'user_id' => 1, // ID user yang ada
        'tanggal_pinjam' => now()->addDays(1)->format('Y-m-d'),
        'jam_mulai' => '08:00:00',
        'jam_selesai' => '10:00:00',
        'keperluan' => 'Seminar Nasional',
        'status' => 'disetujui'
    ]);
    }
}
