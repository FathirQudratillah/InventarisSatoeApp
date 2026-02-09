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
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->char('kode_barang', 11)->primary();
            $table->char('id_ruang', 5);
            $table->char('id_kategori', 3);
            $table->char('jenis_barang', 10);
            $table->string('kondisi_barang', 8);
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('id_ruang')
                ->references('id_ruang')
                ->on('data_ruangs')
                ->cascadeOnDelete();
                
            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('data_kategori_barangs')
                ->cascadeOnDelete();

            $table->foreign('jenis_barang')
                ->references('jenis_barang')
                ->on('data_jenis_barangs')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barangs');
    }
};
