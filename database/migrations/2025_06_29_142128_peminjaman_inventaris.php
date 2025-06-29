<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_inventaris', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('peminjaman_id')->unsigned()->nullable()->comment('Terhubung ke peminjaman ruangan (jika ada)');
            $table->bigInteger('user_id')->unsigned()->notNull();
            $table->bigInteger('inventaris_id')->unsigned()->notNull();
            $table->integer('jumlah')->notNull();
            $table->date('tanggal_pinjam')->notNull();
            $table->date('tanggal_kembali')->notNull();
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'selesai'])->default('menunggu');
            $table->enum('kondisi_kembali', ['baik', 'rusak_ringan', 'rusak_berat'])->nullable();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('inventaris_id')->references('id')->on('inventaris');
            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_inventaris');
    }
};
