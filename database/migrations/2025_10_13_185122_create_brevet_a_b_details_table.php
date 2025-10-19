<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('brevetab_detail', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('brevetab_id')->constrained('brevetab')->onDelete('cascade');
    //         $table->string('fasilitas', 255);
    //         $table->text('deskripsi_fasilitas')->nullable();
    //         $table->integer('durasi_jam')->nullable();
    //         $table->string('instruktur', 255)->nullable();
    //         $table->string('lokasi', 255);
    //         $table->integer('kuota_peserta')->default(1);
    //         $table->enum('level', ['Beginner', 'Intermediate', 'Advanced']);
    //         $table->text('syarat_peserta')->nullable();
    //         $table->text('materi_pelatihan')->nullable();
    //         $table->timestamps();
    //     });
    // }

    public function down(): void
    {
        Schema::dropIfExists('brevetab_detail');
    }
};
