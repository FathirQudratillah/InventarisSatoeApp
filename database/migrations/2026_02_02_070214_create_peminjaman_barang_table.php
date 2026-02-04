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
        Schema::create('peminjaman_barang', function (Blueprint $table) {
            $table->char('id_peminjaman', 8)->primary();

            $table->foreign('user_id')
            ->references('user_id')
            ->on('peminjaman_barang')
            ->cascadeOnDelete();

            $table->foreign('data_admin')
            ->references('data_admin')
            ->on('peminjaman_barang')
            ->cascadeOnDelete();

            $table->string('status_peminjaman', 16);
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barang');
    }
};
