<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_detail_in_house_trainings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_in_house_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_in_house_training_id')->constrained('item_in_house_trainings')->onDelete('cascade');
            $table->string('nama_peserta');
            $table->string('email');
            $table->string('no_telepon');
            $table->string('perusahaan');
            $table->string('jabatan');
            $table->enum('status_pendaftaran', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_in_house_trainings');
    }
};