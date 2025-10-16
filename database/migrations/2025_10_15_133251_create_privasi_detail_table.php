<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_privasi_detail_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('privasi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_privasi_id')->constrained('layanan_privasi')->onDelete('cascade');
            $table->integer('waktu_menit');
            $table->json('benefit'); // Menyimpan benefit dalam bentuk array JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('privasi_detail');
    }
};