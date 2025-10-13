<?php
// database/migrations/2024_01_01_create_detail_brevet_c_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_brevet_c', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brevet_c_id')->constrained('brevet_c')->onDelete('cascade');
            $table->string('fasilitas'); // fasilitas yang didapat
            $table->text('keterangan')->nullable(); // detail fasilitas
            $table->integer('urutan')->default(0); // untuk mengurutkan fasilitas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_brevet_c');
    }
};