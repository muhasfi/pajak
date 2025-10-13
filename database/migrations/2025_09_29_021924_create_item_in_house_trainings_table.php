<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_item_in_house_trainings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_in_house_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->decimal('harga', 15, 2);
            $table->string('gambar')->nullable();
            $table->string('lokasi');
            $table->integer('kuota_peserta');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_in_house_trainings');
    }
};