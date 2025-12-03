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
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // Wajib upload gambar
            $table->string('nama_program'); // Nama program donasi
            $table->date('tanggal'); // Format tanggal YYYY-MM-DD
            $table->bigInteger('target')->nullable(); // Bisa null kalau unlimited
            $table->boolean('unlimited_target')->default(false); // Opsi target tak terbatas
            $table->text('deskripsi'); // Deskripsi donasi
            $table->string('tag')->nullable(); // opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};
