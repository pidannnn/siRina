<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations - Tambah kolom surat_path.
     */
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->string('surat_path')
                  ->nullable()
                  ->after('status')
                  ->comment('Path/lokasi penyimpanan file surat peminjaman');
        });
    }

    /**
     * Reverse the migrations - Hapus kolom surat_path.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn('surat_path');
        });
    }
};