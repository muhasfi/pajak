<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_training_details_table.php
public function up()
{
    Schema::create('training_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('training_id')->constrained()->onDelete('cascade');
        $table->string('materi');
        $table->string('instruktur');
        $table->integer('durasi_jam');
        $table->string('tempat');
        $table->integer('kuota_peserta');
        $table->text('peralatan_dibutuhkan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_details');
    }
};
