<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_layanan_privasi_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('layanan_privasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanan_privasi');
    }
};