<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_detail_brevetab_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_brevetab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brevetab_id')->constrained('brevet_a_b')->onDelete('cascade');
            $table->string('fasilitas');
            $table->text('deskripsi_fasilitas')->nullable();
            $table->integer('durasi_jam')->nullable();
            $table->string('instruktur')->nullable();
            $table->string('lokasi');
            $table->integer('kuota_peserta');
            $table->string('level')->comment('Beginner, Intermediate, Advanced');
            $table->text('syarat_peserta')->nullable();
            $table->text('materi_pelatihan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_brevetab');
    }
};