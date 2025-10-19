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
    //     Schema::create('brevetab', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('gambar')->nullable();
    //         $table->string('judul', 255);
    //         $table->text('deskripsi');
    //         $table->string('hari', 100);
    //         $table->date('tanggal_mulai');
    //         $table->date('tanggal_selesai');
    //         $table->decimal('harga', 15, 2)->default(0);
    //         $table->timestamps();
    //     });
    // }

    public function down(): void
    {
        Schema::dropIfExists('brevetab');
    }
};
