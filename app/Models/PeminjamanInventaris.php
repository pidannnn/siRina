<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanInventaris extends Model
{
    const STATUS_MENUNGGU = 'menunggu';
    const STATUS_DISETUJUI = 'disetujui'; // ✅ gunakan nilai enum yang sesuai
    const STATUS_DITOLAK = 'ditolak';

    protected $table = 'peminjaman_inventaris';

    protected $fillable = [
        'user_id',
        'inventaris_id',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jam_mulai',
        'jam_selesai',
        'status',
        'keperluan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventaris()
    {
            return $this->belongsTo(Inventaris::class);

    }
}
