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
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->char('id_detail', 10)->primary();
            $table->char('kode_barang', 11);
            $table->char('id_peminjaman', 8);

            $table->foreign('kode_barang')
            ->references('kode_barang')
            ->on('data_log_aktivitasdata_barang')
            ->cascadeOnDelete();

            $table->foreign('id_peminjaman')
            ->references('id_peminjaman')
            ->on('peminjaman_barang')
            ->cascadeOnDelete();
            
            $table->string('kondisi_sebelum', 5);
            $table->string('kondisi_sesusdah', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
