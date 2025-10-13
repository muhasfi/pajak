<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_detail_seminar_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_seminar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_seminar_id')->constrained('item_seminar')->onDelete('cascade');
            $table->string('pembicara');
            $table->string('lokasi');
            $table->integer('kuota_peserta');
            $table->string('kategori');
            $table->string('level')->comment('Beginner, Intermediate, Advanced');
            $table->text('fasilitas');
            $table->string('kontak_person');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_seminar');
    }
};