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
        Schema::create('data_admin', function (Blueprint $table) {
            $table->char('nip', 10)->primary();
            $table->char('user_id', 10);
            $table->string('nama', 60);
            $table->string('email', 255)->unique();
            $table->integer('no_kontak', 13);
            $table->string('alamat', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_admin');
    }
};
