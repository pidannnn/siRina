<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    public function peminjamans()
    {
        return $this->hasMany(PeminjamanInventaris::class, 'inventaris_id');
    }
    protected $table = 'inventaris';

    protected $fillable = [
    'kode', // ✅ tambahkan ini!
    'nama',
    'jumlah',
    'kondisi',
];

}
