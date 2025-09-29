<?php
// database/migrations/2024_01_01_create_brevet_c_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('brevet_c', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('hari');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('harga', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brevet_c');
    }
};