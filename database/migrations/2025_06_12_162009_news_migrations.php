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
    Schema::create('artikel', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('deskripsi');
        $table->dateTime('tanggal');
        $table->string('gambar');
        $table->string('gambar_caption')->nullable();
        $table->string('keyword');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
