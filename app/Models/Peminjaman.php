<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjaman'; // ✅ Ini WAJIB agar tidak error

    protected $fillable = [
        'ruangan_id',
        'user_id', 
        'tanggal_pinjam',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status'
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
        return $this->hasMany(Peminjaman::class);
    }

    // // Relasi ke Inventaris (many-to-many melalui PeminjamanInventaris)
    // public function inventaris()
    // {
    //     return $this->belongsToMany(Inventaris::class, 'peminjaman_inventaris')
    //                 ->withPivot('jumlah')
    //                 ->withTimestamps();
    // }
}
