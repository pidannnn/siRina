<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{

   protected $table = 'ruangan'; // Sesuaikan dengan nama tabel di database
    
    protected $fillable = [
        'nama',
        'gedung',
        'lantai',
        'kapasitas',
        'tipe',
        'fasilitas'
    ];


    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class);
    
}
}
