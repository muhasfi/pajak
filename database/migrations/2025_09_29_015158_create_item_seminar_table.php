<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_item_seminar_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_seminar', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_seminar');
    }
};