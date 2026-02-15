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
        Schema::create('data_kelas', function (Blueprint $table) {
            $table->char('id_kelas', 9)->primary();
            $table->char('id_jurusan', 3);
            $table->integer('angkatan', 3);
            $table->string('kelas');
            $table->string('subkelas', 1);
            $table->timestamps();

            $table->foreign('id_jurusan')
                  ->references('id_jurusan')
                  ->on('data_jurusan')
                  ->cascadeOnDelete();
                  
            $table->foreign('angkatan')
                ->references('angkatan')
                ->on('data_angkatan')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kelas');
    }
};
