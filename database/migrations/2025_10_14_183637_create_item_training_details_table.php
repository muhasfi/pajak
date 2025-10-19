<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_training_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained('item_trainings')->onDelete('cascade');
            $table->text('materi');
            $table->string('instruktur', 255);
            $table->integer('durasi_jam');
            $table->string('tempat', 255);
            $table->integer('kuota_peserta');
            $table->string('peralatan_dibutuhkan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_training_details');
    }
};
