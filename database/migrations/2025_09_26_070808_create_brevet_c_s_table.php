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
    Schema::create('brevet_c_s', function (Blueprint $table) {
        $table->id();
        $table->string('gambar');
        $table->string('judul');
        $table->text('deskripsi');
        $table->string('hari');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->decimal('harga', 10, 2); // 10 digit total, 2 di belakang koma
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brevet_c_s');
    }
};
