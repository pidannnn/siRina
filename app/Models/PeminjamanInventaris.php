<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanInventaris extends Model
{
    protected $table = 'peminjaman_inventaris';
    protected $fillable = [
        'user_id', 'tanggal_pinjam', 'jam_mulai', 'jam_selesai', 'keperluan', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventaris()
    {
        return $this->belongsToMany(Inventaris::class, 'peminjaman_inventaris_inventaris')
                    ->withPivot('jumlah');
    }
}
