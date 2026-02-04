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
        Schema::create('pengajuan_barang', function (Blueprint $table) {
            $table->char('id_pengajuan', 8)->primary();
            $table->char('user_id', 10);
            $table->string('nama_barang', 100);
            $table->string('status_pengajuan', 10);
            $table->date('tanggal_pengajuan', 10);
            $table->integer('jumlah_pengajuan', 4);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('data_akun')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_barang');
    }
};
